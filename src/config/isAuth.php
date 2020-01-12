<?php
return [
    "middleware"=>['web'], //for laravel routes (web,api...)
    "options"=>[
        "loginField"=>"email", //set this username if you login with
        "texts"=>[ //translate
            "placeholder"=>"Type Your Password",
            "wrong"=>"Wrong Password",
            "error"=>"Error",
            "button"=>"Login"
        ]
    ],
];
