<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        if($search = $request->search){
            $food = Food::where('name', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%")->paginate();
        }
        else{
            $food = Food::paginate();
        }
    
        return view('dashboard.foods.index',[
            'foods'=> $food
        ]);
    }

    public function create(){
        return view('dashboard.foods.create',[
            'foods' => Category::all()
        ]);
    }

    public function store(Request $request, Food $food){
        $food->category_id = $request->category_id;

        $food->fill(
            $this->validate($request, $this->rules())
        );

        $random = Str::random(40) . '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(public_path(), $random);

        $food->image = $random;

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

        $food->category_id = $request->category_id;

        $food->fill($this->validate($request, $this->rules()));
        $random = Str::random(40) . '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(public_path(), $random);

        $food->image = $random;
        
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            'description' => 'nullable',
            'category_id'=> 'required'
        ];
    }
}

