<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
        $products = Product::latest()->paginate(5);
        return view('admin.allproducts',compact('products'));
    }
    public function AddProduct(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();

        return view('admin.addproduct',compact('categories','subcategories'));
    }
    public function StoreProduct(Request $request){
        $request->validate([
            'product_name'=>'required|unique:products',
            'price'=>'required',
            'quantite'=>'required',
            'product_short_des'=>'required',
            'product_log_desc'=>'required',
            'product_category_id'=>'required',
            'product_subcategory_id'=>'required',
            'product_img'=>'required|image|mimes:jpge,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;
        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;
        $category_name = Category::where('id',$category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id',$subcategory_id)->value('subcategory_name');
        Product::insert([
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'quantite'=>$request->quantite,
            'product_short_des'=>$request->product_short_des,
            'product_log_desc'=>$request->product_log_desc,
            'product_category_id'=>$request->product_category_id,
            'product_subcategory_id'=>$request->product_subcategory_id,
            'product_category_name'=>$category_name,
            'product_subcategory_name'=>$subcategory_name,
            'slug'=>strtolower(str_replace(' ','-',$request->product_name)),
            

            'product_img'=>$img_url,
        ]);
        Category::where('id',$category_id)->increment('product_count',1);
        SubCategory::where('id',$subcategory_id)->increment('product_count',1);
        return redirect()->route('allproducts')->with('message','Product Added Succefully');
    }

    public function EditProductImg($id){
        $product_info = Product::findOrFail($id);
        return view('admin.editproductimg',compact('product_info'));
    }
    public function UpdateProductImg(Request $request){
        $request->validate([
            'product_img'=>'required|image|mimes:jpge,png,jpg,gif,svg|max:2048',
        ]);


        $id = $request->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;
        
        Product::findOrFail($id)->update([
            'product_img' =>$img_url
        ]);


        return redirect()->route('allproducts')->with('message','Product Image Updated Succefully');
    }

    public function EditProduct($id){
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view ('admin.editproduct',compact('product','categories','subcategories'));
    }
    public function UpdateProduct(Request $request){
        $productid = $request->id;

        $request->validate([
            'product_name'=>'required|unique:products',
            'price'=>'required',
            'quantite'=>'required',
            'product_short_des'=>'required',
            'product_log_desc'=>'required',
        ]);
        
        Product::findOrFail($productid)->update([
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'quantite'=>$request->quantite,
            'product_short_des'=>$request->product_short_des,
            'product_log_desc'=>$request->product_log_desc,
            'slug'=>strtolower(str_replace(' ','-',$request->product_name)),
        ]);
        return redirect()->route('allproducts')->with('message','Product  Updated Succefully');
    }
    public function DeleteProduct($id){
        Product::findOrFail($id)->delete();
        $cat_id = Product::where('id',$id)->value('product_category_id');
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        Category::where('id',$cat_id)->decremante('product_count',1);
        SubCategory::where('id',$subcat_id)->decremante('subcategory_count',1);
        return redirect()->route('allproducts')->with('message','Product Deleted Succefully');

    }


}
