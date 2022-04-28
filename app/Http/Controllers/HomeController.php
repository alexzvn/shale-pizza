<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\FoodRepo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $food = FoodRepo::getAllWithCategory();

        return view('welcome', [
            'foods' => $food
        ]);
    }

    public function search(Request $request)
    {
        return view('search', [
            'search' => FoodRepo::search($request->search)
        ]);
    }

    public function show($id)
    {
        $food = FoodRepo::getByIdWithCategory($id);

        return view('detail', [
            'food' => $food,
            'relatives' => FoodRepo::getRelativesByCategory($food->category_id, 4)
        ]);
    }

    public function filter($id)
    {
        return view('welcome',[
            'foods' => FoodRepo::getAllFoodByCate($id)
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
        return view('gallery', [
            'photos' => collect(FoodRepo::getAll())->shuffle(seed: '1239')
        ]);
    }
}
