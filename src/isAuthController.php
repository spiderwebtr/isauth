<?php

namespace spiderwebtr\isauth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class isAuthController extends Controller
{

    function isAuth(){
        return response()->json(
            \Auth::check()?
                ["logged"=>true, "csrf"=>(csrf_token())]:
                ["logged"=>false]
        );
    }

    function ajaxlogin(Request $request){
        $success=\Auth::attempt(["email"=>$request->email,"password"=>$request->password]);
        return $success?$this->isAuth():"{logged:false}";
    }
}
