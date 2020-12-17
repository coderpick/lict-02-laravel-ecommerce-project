<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\CustomHelper;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use CustomHelper;
    public function index()
    {
         $brands = Brand::all();
         return view('backend.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return  view('backend.brand.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|unique:brands'
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $this->str_slug($request->name);
        $brand->save();
        notify()->success('Brand Save Successfully ⚡️', 'Brand Save');
        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {

        return view('backend.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
       $this->validate($request,[
            'name' =>'required'
        ]);

        $brand->name = $request->name;
        $brand->slug = $this->str_slug($request->name);

        if($request->status == 1){
            $brand->status = true;
        }else{
            $brand->status = false;
        }
        $brand->save();
        notify()->success('Brand Update Successfully ⚡️', 'Brand Update');
        return redirect()->route('admin.brands.index');
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        notify()->success('Brand Delete Successfully ⚡️', 'Brand Delete');
        return redirect()->route('admin.brands.index');
    }
}
