<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
     public function getSubCategory(Request $request){
       return SubCategory::where('category_id',$request->id)->get();
    }
}
