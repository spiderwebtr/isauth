function defineIsAuth(user, newOptions = {}){
    let options = {
        texts: {
            placeholder:"Type Your Password",
            wrong:"Wrong Password",
            error:"Error",
            button:"Login"
        },
        loginField: 'email'
    };
    $.extend(options, newOptions);
    let object={
        posterror:function(){
            swal({
                title:options.texts.error,
                icon:"error"
            });
        },
        object:this,
        csrf:null,
        isAuth:function(callback){
            $.get("/isAuth").done(function (data) {
                if(data.csrf!==object.csrf) object.update_csrf(data.csrf);
                if (data.logged) {
                    if (callback) callback();
                }else{
                    object.askPassword(callback);
                }
            }).fail(function () {
                object.posterror();
            });
        },
        askPassword:function(callback){
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
                        $.post("/ajaxlogin",
                            {
                                username:user[options.loginField],
                                password,
                                loginField: options.loginField
                            }
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
                        }).fail(function () {
                            object.posterror();
                        });
                    }else{
                        swal.close();
                    }
                });
        },
        update_csrf:function(newcsrf){
            object.csrf=newcsrf;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': newcsrf
                }
            });
            $("input[name='_token']").val(newcsrf);
        }
    };
    object.update_csrf($('meta[name="csrf-token"]').attr('content'));
    $("form").submit(function (event) {
        let _this=this;
        event.preventDefault();
        object.isAuth(function () {
            $(_this).unbind('submit').submit();
        });
    });
    return object;
}
