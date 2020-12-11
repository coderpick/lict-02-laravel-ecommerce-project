<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\CustomHelper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use CustomHelper;

    public function index()
    {
        $data['categories'] = Category::latest()->get();
        return  view('backend.category.index',$data);

    }


    public function create()
    {
        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $this->str_slug($request->name);
        $category->save();
        notify()->success('Category Save Successfully ⚡️', 'Category Save');
        return redirect()->route('admin.category.index');
    }


    public function show(Category $category)
    {

    }


    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories'
        ]);

        $category->name = $request->name;
        $category->slug = $this->str_slug($request->name);
        $category->save();
        notify()->success('Category Update Successfully ⚡️', 'Category Update');
        return redirect()->route('admin.category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        notify()->success('Category Delete Successfully ⚡️', 'Category Delete');
        return redirect()->route('admin.category.index');
    }
}
