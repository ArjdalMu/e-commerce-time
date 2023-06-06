<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index(){
        $subcategories = SubCategory::latest()->get();
        return view('admin.allsubcategory',compact('subcategories'));
    }
    public function AddSubCategory(){
        $categories = Category::latest()->get();
        return view('admin.addsubcategory',compact('categories'));
    }
    public function StoreSubCategory(Request $request){
        $request->validate([
            'subcategory_name' =>'required|unique:sub_categories',
            'category_id' => 'required'
        ]);
        $category_id = $request->category_id;
        $category_name =Category::where('id',$category_id)->value('category_name');

        SubCategory::insert([
            'subcategory_name' =>$request->subcategory_name,
            'slug'=>strtolower(str_replace(' ','-',$request->category_name)),
            'category_id' =>$category_id,
            'category_name' => $category_name
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()->route('allsubcategory')->with('message','Category Added Succefully');
    }
    public function EditSubCategory($id){
        $subcategory_infos = SubCategory::findOrFail($id);
        return view('admin.editsubcategory',compact('subcategory_infos'));
    }
    public function UpdateSubCategory(Request $request){
        $request->validate([
            'subcategory_name' =>'required|unique:sub_categories',
        ]);
        $subcatid = $request->subcatid;

       SubCategory::findOrFail($subcatid)->update([
        'subcategory_name'=>$request->subcategory_name,
        'slug' => strtolower(str_replace(' ','-',$request->subcategory_name))
       ]);
        return redirect()->route('allsubcategory')->with('message','SubCategory Updated Succefully');
    }
    public function DeleteSubCategory($id){
        $cat_id = SubCategory::where('id',$id)->value('category_id');
        SubCategory::findOrFail($id)->delete();
        Category::where('id',$cat_id)->decrement('subcategory_count',1);
        return redirect()->route('allsubcategory')->with('message','SubCategory Deleted Succefully');
        

    }

}

