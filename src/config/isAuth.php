<?php
return [
    "middleware"=>['web'], //for laravel routes (web,api...)
    "options"=>[
        "loginField"=>"email", //If your project uses username to login, change it with "username".
        "texts"=>[ //translate
            "placeholder"=>"Type Your Password",
            "wrong"=>"Wrong Password",
            "error"=>"Error",
            "button"=>"Login"
        ]
    ],
];
