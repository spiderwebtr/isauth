# isAuth
This package provides control to check if user session dead before submit forms. If the session is dead, a modal will reveal and ask password to re-login.

## Installation
Require this package with composer.

```shell
composer require spiderwebtr/isauth
```

### Laravel 5.5+
If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
spiderwebtr\isauth\isAuthServiceProvider::class,
```

### Include JQuery and Sweet Alert
You can download the js files or just use cdn.

```html
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
```

### Create assets
Run the command to copy js file.

```bash
php artisan vendor:publish --tag=public --force
```

### Last Step
Add this code to the footer in your blade. `user` object provides information in login modal.
```html
<script>
    let user={
        name:"{{$user->name}}",
        email:"{{$user->email}}",
        photo:"{{$user->getFirstMediaUrl("image","thumb")}}" //edit this up to your system or just remove this line.
    };
</script>
<style>
    .swal-icon--custom>img{
        max-height: 250px;
        border-radius: 50%;
    }
</style>
<script src="/assets/SpiderWebtr/isAuth/isAuth.js"></script>
```

## Extras

### Translate
In `isAuth.js` file there is  `texts` object which provides texts to package. You can modify them to translate.

### isAuth Function
`isAuth` function takes a callback parameter so you can call `isAuth` in your code.

```javascript
isAuth(function(){
    //do something 
});
```

Login modal will reveal if the session is dead. When you re-login, your code will work with callback.





