<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\ShippingInfo;
use App\Models\ShippingInfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\delete;

class ClientController extends Controller
{
    public function CategoryPage($id){
        $categories = Category::findOrFail($id);
        $products = Product::where('product_category_id',$id)->latest()->get();
        return view('home.category',compact('categories','products'));
    }
    public function SingleProduct($id){
        $products = Product::findOrFail($id);
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id',$subcat_id)->latest()->get();

        return view('home.product',compact('products','related_products'));
    }
    public function AddToCart(){
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id',$user_id)->get();
        return view('home.addtocart',compact('cart_items'));
    }
    public function Checkout(){
        $user_id =  Auth::id();
        $cart_items = Cart::where('user_id',$user_id)->get();
        $shipping_ad = ShippingInfos::where('user_id',$user_id)->first();
        return view('home.checkout',compact('cart_items','shipping_ad'));
    }
    public function UserProfile(){
        return view('home.profile');
    }
    public function PendingOrders(){
        $id = Auth::user()->id;

        $pending_orders = Order::where('status','pending')->where('user_id',$id)->latest()->get();
        return view('home.pendingorders',compact('pending_orders'));
    }
    public function History(){
        

$id = Auth::user()->id;

$pending_orders = Order::where('status', 'confirmed')
    ->where('user_id', $id)
    ->latest()
    ->get();


foreach ($pending_orders as $order) {
    $product = Product::find($order->product_id);
    $order->product = $product;
}

return view('home.history', compact('pending_orders'));

    }
    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message','Your item has been  deleted to cart Succefuly');

    }
    public function GetShippingAdresse(){
        return view('home.shippingadresse');
    }
    public function AddShippingAdresse(Request $request){
        $request->validate([
            'phone_number'=>'required',
            'city_name'=>'required',
            'code_postal'=>'required'
            
        ]);
       
        ShippingInfos::insert([
            'user_id'=>Auth::id(),
            'phone_number'=>$request->phone_number,
            'city_name'=>$request->city_name,
            'postal_code'=>$request->code_postal

            
        ]);
        return redirect()->route('checkout');
    }
    public function PlaceOrder(Request $request){
        $user_id =  Auth::id();
        $cart_items = Cart::where('user_id',$user_id)->get();
        $shipping_ad = ShippingInfos::where('user_id',$user_id)->first();

        foreach($cart_items as $item){
            Order::insert([
                'user_id'=>$user_id,
                'shipping_phoneNumber'=>$shipping_ad->phone_number,
                'shipping_postalcode'=>$shipping_ad->postal_code,
                'shipping_city'=>$shipping_ad->city_name,
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'total_price'=>$item->price,

            ]);
           
            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        $shipping_ad::where('user_id',$user_id)->first()->delete();
        
        return redirect()->route('pendingorders')->with('message','Your Order Has Been Placed Succefully');
    }

    public function AddProductToCart(Request $request){
        $product_price= $request->price;
        $quantity = $request->product_quantite;
        $price = $product_price * $quantity;

        Cart::insert([
            'product_id'=>$request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=>$request->product_quantite,
            'price'=>$price

        ]);
        return redirect()->route('addtocart')->with('message','Your item added to cart Succefuly');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    
    
}
