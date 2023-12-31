<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
    }

    /*logout with post method*/
    public function postLogout(){
        Auth::logout();

        return redirect()->route('post.login')
            ->with('success', 'You are successfully log out.');
    }

    /*logout with get method*/
    public function getLogout(){
        Auth::logout();

        return redirect()->route('get.login')
            ->with('success', 'You are successfully log out.');
    }
}
