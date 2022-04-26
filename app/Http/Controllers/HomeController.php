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

    public function show($id)
    {
        $food = FoodRepo::getByIdWithCategory($id);
        return view('detail',
            [
                'food'=> $food
            ]
        );
    }

    public function contact()
    {
        return view('contact');
    }

    public function gallery()
    {
        return view('gallery', [
            'photos' => collect(FoodRepo::getAll())
        ]);
    }

    public function download()
    {
        return view('download');
    }
}
