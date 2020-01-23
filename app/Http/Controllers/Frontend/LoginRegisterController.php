<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('frontend.login-register');
    }
}
