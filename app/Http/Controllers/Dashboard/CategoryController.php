<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index', [
            'categories' => Category::paginate()

            //paginate: phân trang
            //Category: model lấy dữ liệu từ database
        ]);
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function delete(Category $category)
    {

        //Xóa theo id
        $category->delete();
        
        //Quay trở về route manager
        return to_route('manager.category');
    }

    public function update(Request $request, Category $category)
    {
        
        $attributes = $this->validate($request, [
            'name' => 'required',
        ]);

        //fill: gắn dữ liệu cho model
        //save: lưu vào database 

        $category->fill($attributes);
        $category->save();

        return to_route('manager.category');
    }

    public function store(Request $request, Category $category)
    {
        $category->fill(
            $this->validate($request, $this->rules())
        );
        $category->save();

        return to_route('manager.category');
    }

    public function rules()
    {
        //validation
        return [
            'name'=>'required',
        ];
    }
}
