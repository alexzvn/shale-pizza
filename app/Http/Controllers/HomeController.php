<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\HomeRepo;
use App\Repositories\FoodRepo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $pizza = HomeRepo::getAllPizza();
        // $drink = HomeRepo::getAllDrink();
        // $spaghetti = HomeRepo::getAllSpaghetti();
        // $salad = HomeRepo::getAllSalad();
        // $combo = HomeRepo::getAllCombo();
        // $other = HomeRepo::getAllOther();
        // return view('welcome',[
        //     'pizza'=> $pizza,
        //     'drink' => $drink,
        //     'spaghetti' => $spaghetti,
        //     'salad' => $salad,
        //     'combo' => $combo,
        //     'other' => $other
        // ]);
        $food = FoodRepo::getAllWithCategory();
        return view('welcome',[
            'foods' => $food
        ]);
    }

    public function search()
    {
        
        // $search = (object)[
        //     'search' => $request->input('search'),
        // ];
        // dd($search);
        $search = $_GET['search'];
        $result = FoodRepo::search($search); 
        return view('search', [
            'search' => $result
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

    public function filter($id){
        $food = FoodRepo::getAllFoodByCate($id);
        return view('welcome',[
            'foods' => $food
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function download()
    {
        return view('download');
    }

    public function gallery()
    {
        $seed = '1239';

        return view('gallery', [
            'photos' => collect(FoodRepo::getAll())->shuffle($seed)
        ]);
    }
}
