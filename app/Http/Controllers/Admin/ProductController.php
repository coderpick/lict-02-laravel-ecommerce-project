<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\CustomHelper;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use CustomHelper, ImageHandler;
    public function index()
    {
        $products = Product::all();
        return  view('backend.product.index',compact('products'));
    }



    public function create()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        return  view('backend.product.create',compact('categories','brands'));
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'category'=>'required',
            'sub_category'=>'required',
            'brand'=>'required',
            'name'=>'required',
            'price'=>'required',
            'total_product'=>'required',
            'product_detail'=>'required',
            'image_one'=>'required|mimes:jpg,jpeg,png|max:2024',
            'image_two'=>'required|mimes:jpg,jpeg,png|max:2024',
            'image_three'=>'required|mimes:jpg,jpeg,png|max:2024',
        ]);

        $product = new Product();
        $product->category_id  =$request->category;
        $product->sub_category_id  =$request->sub_category;
        $product->brand_id  =$request->brand;
        $product->name  =$request->name;
        $product->slug  = $this->str_slug($request->name);
        $product->details  =$request->product_detail;
        $product->features  =$request->product_feature;
        $product->price  =$request->price;
        $product->total_product  =$request->total_product;
        if (isset($request->status)){
            $product->status =$request->status;
        }
        if (isset($request->status)){
            $product->status =$request->status;
        }
        $slug = $this->str_slug($request->name);
        $imageOne = $request->file( 'image_one' );
        $this->uploadImage($imageOne,$slug,'product','415','470');
        $product->image_one = $this->imageName;

        $imageTwo = $request->file( 'image_two' );
        $this->uploadImage($imageTwo,$slug,'product','415','470');
        $product->image_two = $this->imageName;

        $imageThree = $request->file( 'image_three' );
        $this->uploadImage($imageThree,$slug,'product','415','470');
        $product->image_three = $this->imageName;
        $product->save();
        notify()->success('Product Save Successfully ⚡️', 'Product Save');
        return redirect()->route('admin.products.index');

    }


    public function show(Product $product)
    {
        return view('backend.product.show',compact('product'));
    }


    public function edit(Product $product)
    {
        $categories  = Category::all();
        $brands      = Brand::all();
        return  view('backend.product.edit',compact('categories','brands','product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'category'=>'required',
            'sub_category'=>'required',
            'brand'=>'required',
            'name'=>'required',
            'price'=>'required',
            'total_product'=>'required',
            'product_detail'=>'required',
            'image_one'=>'nullable|mimes:jpg,jpeg,png|max:2024',
            'image_two'=>'nullable|mimes:jpg,jpeg,png|max:2024',
            'image_three'=>'nullable|mimes:jpg,jpeg,png|max:2024',
        ]);

        $product = $product;
        $product->category_id  =$request->category;
        $product->sub_category_id  =$request->sub_category;
        $product->brand_id  =$request->brand;
        $product->name  =$request->name;
        $product->slug  = $this->str_slug($request->name);
        $product->details  =$request->product_detail;
        $product->features  =$request->product_feature;
        $product->price  =$request->price;
        $product->total_product  =$request->total_product;
        if (isset($request->status)){
            $product->status =$request->status;
        }
        if (isset($request->status)){
            $product->status =$request->status;
        }
        $slug = $this->str_slug($request->name);
        $imageOne = $request->file( 'image_one' );
        $this->uploadImage($imageOne,$slug,'product','415','470',null,$product->image_one);
        $product->image_one = $this->imageName;

        $imageTwo = $request->file( 'image_two' );
        $this->uploadImage($imageTwo,$slug,'product','415','470',null,$product->image_two);
        $product->image_two = $this->imageName;

        $imageThree = $request->file( 'image_three' );
        $this->uploadImage($imageThree,$slug,'product','415','470',null,$product->image_three);
        $product->image_three = $this->imageName;
        $product->save();
        notify()->success('Product Update Successfully ⚡️', 'Product Update');
        return redirect()->route('admin.products.index');
    }


    public function destroy(Product $product)
    {
        $this->deleteImage($product->image_one,'product');
        $this->deleteImage($product->image_two,'product');
        $this->deleteImage($product->image_three,'product');
        $product->delete();
        notify()->success('Product Delete Successfully ⚡️', 'Product Delete');
        return redirect()->route('admin.products.index');
    }
}
