<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\CustomHelper;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    use CustomHelper;
    public function index()
    {
       $subCategories = SubCategory::all();
       return  view('backend.sub_category.index',compact('subCategories'));
    }


    public function create()
    {
        $categories = Category::all();
        return  view('backend.sub_category.create',compact('categories'));
    }


    public function store(Request $request)
    {
       $this->validate($request,[
             'category'=>'required',
             'name'=>'required'
       ]);
        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = $this->str_slug($request->name);
        $subCategory->save();
        notify()->success('Sub Category Save Successfully ⚡️', 'Sub Category Save');
        return redirect()->route('admin.subcategory.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return  view('backend.sub_category.edit',compact('categories','subCategory'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
             'category'=>'required',
             'name'=>'required'
       ]);
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = $this->str_slug($request->name);
        $subCategory->save();
        notify()->success('Sub Category Update Successfully ⚡️', 'Sub Category Update');
        return redirect()->route('admin.subcategory.index');
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        notify()->success('Sub Category Delete Successfully ⚡️', 'Sub Category Delete');
        return redirect()->route('admin.subcategory.index');
    }
}
