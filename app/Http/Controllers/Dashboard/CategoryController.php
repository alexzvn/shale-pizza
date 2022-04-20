<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepos;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index', [
            'categories' => CategoryRepos::getAll()
        ]);
    }

    public function edit(int $id)
    {
        return view('dashboard.category.edit', [
            'category' => CategoryRepos::getById($id)
        ]);
    }
    
    public function create()
    {
        return view('dashboard.category.create');
    }

    public function delete(int $id)
    {
       CategoryRepos::delete($id);
        return to_route('manager.category');
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        CategoryRepos::updates($id, $request->name);
        return to_route('manager.category');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        CategoryRepos::insert(
            $request->name,
        );

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
