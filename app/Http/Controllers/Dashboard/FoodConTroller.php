<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return view('dashboard.foods.index',[
            'foods'=> Food::paginate()
        ]);
    }

    public function create(){
        return view('dashboard.foods.create',[
            'foods' => Category::all()
        ]);
    }

    public function store(Request $request, Food $food){
        $food->fill(
            $this->validate($request, $this->rules())
        );

        $food->category_id = $request->category_id;

        $food->save();

        return to_route('manager.foods');
    }

    public function edit(Food $food){
        return view('dashboard.foods.edit',[
            'food'=>$food,
            'foods' => Category::all()
        ]);
    }

    public function update(Request $request, Food $food){
        $attributes = $this->rules();

        $food->category_id = $request->category_id;

        $food->fill($attributes);
        
        $food->save();
        
        return to_route('manager.foods');
    }

    public function delete(Food $food){
        $food->delete();

        return to_route('manager.foods');
    }
    
    public function rules(){
        return[
            'name'=>'required|string|max:255',
            'price' => 'required|numeric|gte:0',
            'image' => 'nullable|string|max:2048',
            'description' => 'nullable',
            'category_id'=> 'required'
        ];
    }
}

