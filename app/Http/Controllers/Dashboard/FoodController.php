<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Category;
use App\Repositories\FoodRepo;
use Illuminate\Foundation\Console\UpCommand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class FoodController extends Controller
{
    public function index()
    {
        return view('dashboard.foods.index', [
            'foods'=> FoodRepo::getAllWithCategory()
        ]);
    }

    public function create(){
        return view('dashboard.foods.create');
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());

        FoodRepo::insert(
            $request->name,
            $request->price,
            $this->upload($request->file('image')),
            $request->description,
            $request->category_id
        );

        return to_route('manager.foods');
    }

    public function edit(int $id)
    {
        return view('dashboard.foods.edit', [
            'food'=> FoodRepo::getById($id)
        ]);
    }

    public function update(Request $request, int $id){
        $this->validate($request, $this->rules());

        FoodRepo::update(
            $id,
            $request->name,
            $request->price,
            $this->upload($request->file('image')),
            $request->description,
            $request->category_id
        );

        return to_route('manager.foods');
    }

    public function confirm(int $id)
    {
        return view('dashboard.foods.delete',[
            'food' => FoodRepo::getById($id)
        ]);
    }

    public function delete(int $id)
    {
        FoodRepo::delete($id);

        return to_route('manager.foods');
    }

    public function upload(UploadedFile $image)
    {
        $str = Str::random(7) . $image->getClientOriginalName() . $image->getClientOriginalName();

        $image->move(public_path('media'), $str);

        return "media/$str";
    }

    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'price' => 'required|numeric|gte:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            'description' => 'nullable',
            'category_id'=> 'required'
        ];
    }
}

