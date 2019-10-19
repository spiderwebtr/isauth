<?php

namespace spiderwebtr\isauth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class isAuthController extends Controller
{

    function isAuth(){
        return response()->json(
            ["logged"=>\Auth::check(), "csrf"=>(csrf_token())]
        );
         alert("isAuthworking");
    }

    function ajaxlogin(Request $request){
        $success=\Auth::attempt(["email"=>$request->email,"password"=>$request->password]);
        return $success?$this->isAuth():"{logged:false}";
    }
}
