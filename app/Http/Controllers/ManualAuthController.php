<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManualAuthController extends Controller
{
    public function ask(){
        return view('auth.regislogin');
    }
}
