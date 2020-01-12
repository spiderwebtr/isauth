<script src="/assets/SpiderWebtr/isAuth/isAuth.js"></script>
<script>
    let user={
        name:"{{$user->name}}",
        email:"{{$user->email}}",
        @isset($photo) photo:"{{$photo}}" @endisset
    };
    let options=@json(config('isAuth.options'));
    let auth=defineIsAuth(user,options);
</script>
<style>
    .swal-icon--custom>img{
        max-height: 250px;
        border-radius: 50%;
    }
</style>
