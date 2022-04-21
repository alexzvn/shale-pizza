<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Category;
use App\Repositories\FoodRepo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.foods.index',[
            'foods'=> FoodRepo::getAllWithCategory($request->search)
        ]);
    }

    public function create(){
        return view('dashboard.foods.create');
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());

        $random = Str::random(40) . '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(public_path(), $random);

        $request->image = $random;

        FoodRepo::insert(
            $request->name,
            $request->price,
            $request->image,
            $request->description,
            $request->category_id
        );

        return to_route('manager.foods');
    }

    public function edit(int $id){
        return view('dashboard.foods.edit',[
            'food'=> FoodRepo::getById($id)
        ]);
    }

    public function update(Request $request, int $id){
        $this->validate($request, $this->rules());

        $random = Str::random(40) . '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(public_path(), $random);

        $request->image = $random;
        
        $food = FoodRepo::getById($id);
        
        FoodRepo::update($id, $request->name, $request->price, $request->image, $request->description, $request->category_id);

        return to_route('manager.foods');
    }

    public function delete(int $id){
        FoodRepo::delete($id);

        return to_route('manager.foods');
    }
    
    public function rules(){
        return[
            'name'=>'required|string|max:255',
            'price' => 'required|numeric|gte:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            'description' => 'nullable',
            'category_id'=> 'required'
        ];
    }
}

