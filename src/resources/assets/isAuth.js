let isAuth = function(user, newOptions = {}) {
    let options = {
        texts: {
            placeholder:"Type your password",
            wrong:"Wrong Password",
            error:"Error",
            button:"Login"
        },
        username: 'email'
    };

    $.extend(options, newOptions);

    let posterror=()=>{
        swal({
            title:options.texts.error,
            icon:"error"
        });
    };
    function isAuthenticated(callback){
        $.get("/isAuth").done(function (data) {
            if(data.csrf!==csrf) update_csrf(data.csrf);
            if (data.logged) {
                if (callback) callback();
            }else{
                askPassword(callback);
            }
        }).fail(()=>posterror());
    }
    function askPassword(callback){
        swal({
            title: user.name,
            icon:user.photo,
            content: {
                element: "input",
                attributes: {
                    placeholder: options.texts.placeholder,
                    type: "password"
                },
            },
            button: {
                text: options.texts.button,
                closeModal: false,
            }
        })
            .then(password => {
                if(password){
                    postData = {
                        password: password
                    };
                    postData[options.username] = user[options.username];

                    $.post("/ajaxlogin",
                        postData
                    ).done(data=> {
                        if(data.logged){
                            swal.stopLoading();
                            swal.close();
                            if (callback) callback();
                        }else{
                            swal({
                                title:options.texts.wrong,
                                icon:"warning",
                                timer: 1000,
                            });
                        }
                    }).fail(()=>posterror());
                }else{
                    swal.close();
                }
            });
    }
    function update_csrf(newcsrf){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': newcsrf
            }
        });
        $("input[name='_token']").val(newcsrf);
    }
    let csrf=$('meta[name="csrf-token"]').attr('content');
    update_csrf(csrf);
    $("form").submit(function (event) {
        let _this=this;
        event.preventDefault();
        isAuthenticated(function () {
            $(_this).unbind('submit').submit();
        });
    });
};