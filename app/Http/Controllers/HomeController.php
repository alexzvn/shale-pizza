<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\FoodRepo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $food = FoodRepo::getAll($request->search);
        return view('welcome',[
            'foods'=> $food
            
        ]);
    }

    public function show($id)
    {
        $food = FoodRepo::getByIdWithCategory($id);
        return view('detail',
            [
                'food'=> $food
            ]
        );
    }
}
