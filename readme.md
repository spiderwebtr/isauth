# isAuth
![alt text](https://img.shields.io/badge/Stable-1.1-blue "Stable")
![alt text](https://img.shields.io/badge/Unstable-dev--master-orange "Unstable")
![alt text](https://img.shields.io/badge/License-MIT-yellow "License")


This package provides control to check if user session dead before submit forms. If the session is dead, a modal will reveal and ask password to re-login.

## Installation
Require this package with composer.

```shell
composer require spiderwebtr/isauth
```

### Laravel < 5.5
If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
spiderwebtr\isauth\isAuthServiceProvider::class,
```
### Create assets
Run the command to create the js file.

```bash
php artisan vendor:publish --tag=public --force
```

### Include JQuery and Sweet Alert
You can download the js files or just use cdn.

```html
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
```

### Last Step
Add this code to the footer in your blade. `user` object provides information in login modal.
```html
<script src="/assets/SpiderWebtr/isAuth/isAuth.js"></script>
<script>
    let user={
        name:"{{$user->name}}",
        email:"{{$user->email}}",
        photo:"{{$user->getFirstMediaUrl("image","thumb")}}" //edit this up to your system or just remove this line.
    };
    let auth=defineIsAuth(user);
</script>
<style>
    .swal-icon--custom>img{
        max-height: 250px;
        border-radius: 50%;
    }
</style>
```


## Extras

### Translation and Customization
If you require a field other than email address to authenticate this can be 
passed in an optional settings object as the second parameter. This settings 
object can also be used to override the default text used for labels and user 
feedback messages.

The field authenticated against will use the default `email`. If your project uses username to login, change it with `username`.

```html
<script>
    let user={
        name:"{{$user->name}}",
        username:"{{$user->username}}",
        photo:"{{$user->getFirstMediaUrl("image","thumb")}}" //edit this up to your system or just remove this line.
    };
    let auth=defineIsAuth(user,{
        texts:{ //change strings to your language
            placeholder:"Type Your Password",
            wrong:"Wrong Password",
            error:"Error",
            button:"Login"
        },
        loginField:"username" //your laravel login field
    });
</script>
```


### isAuth Function
`isAuth` function takes a callback parameter so in your code you can call `isAuth` from the object you defined.

```javascript
auth.isAuth(function(){
    //do something 
});
```

Login modal will reveal if the session is dead. When you re-login, your code will work with callback.

### Contributors
* [@emredipi](https://github.com/emredipi)
* [@jasonhoule]( https://github.com/jasonhoule )
* You can be here :)

### Feedback
If you give me some feedback I will be happy. You can show your satisfaction with star. :star:

### Update from version dev-master to v1.1
If you downloaded the package in development version (dev-master), please remove it apply Installation Guide from this readme file (require,Create assets,Last Step).
