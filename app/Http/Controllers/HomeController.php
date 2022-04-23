<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\FoodRepo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $food = FoodRepo::getAll();
        return view('welcome',[
            'foods'=> $food
        ]);
    }
}
