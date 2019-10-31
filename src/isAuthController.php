<?php

namespace spiderwebtr\isauth;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class isAuthController extends Controller
{

    function isAuth(){
        return response()->json(
            ["logged"=>\Auth::check(), "csrf"=>(csrf_token())]
        );
    }

    function ajaxlogin(Request $request){
        $username = (new LoginController())->username();

        $success=\Auth::attempt([$username=>$request->$username,"password"=>$request->password]);
        return $success?$this->isAuth():"{logged:false}";
    }
}
