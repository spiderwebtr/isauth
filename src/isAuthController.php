<?php

namespace spiderwebtr\isauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class isAuthController extends Controller
{
    public function isAuth()
    {
        return response()->json(
            ['logged'=>\Auth::check(), 'csrf'=>(csrf_token())]
        );
    }

    public function ajaxlogin(Request $request)
    {
        $success = \Auth::attempt([
            $request->loginField=> $request->username,
            'password'          => $request->password,
        ]);

        return $success ? $this->isAuth() : '{logged:false}';
    }
}
