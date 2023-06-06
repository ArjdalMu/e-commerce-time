<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(HomeController::class)->group(function(){
    Route::get('/','Index')->name('home');
    Route::get('/user-login','showLogin')->name('user.login');
    Route::get('/buyer-register',[HomeController::class,'showRegister'])->name('buyer.register');
    Route::post('/buyer-auth', [HomeController::class, 'Login'])->name('buyer.auth');
    Route::post('/buyer-registerstore', [HomeController::class, 'Register'])->name('buyer.registerstore');
});





Route::middleware('auth','role:user')->group(function(){
    Route::controller(ClientController::class)->group(function(){
        Route::get('/category/{id}/{slug}','CategoryPage')->name('category');
        Route::get('/single-product/{id}/{slug}','SingleProduct')->name('singleproduct');
        Route::get('/add-to-cart','AddToCart')->name('addtocart');
        Route::get('/pending-orders','PendingOrders')->name('pendingorders');
        Route::get('/history','History')->name('history');
        Route::post('/add-product-to-cart/{id}','AddProductToCart')->name('addproducttocart');
        Route::get('/remove-cart-item/{id}','RemoveCartItem')->name('removeitem');
        Route::get('/shipping-adresse','GetShippingAdresse')->name('shippingadresse');
        Route::post('/add-shipping-adresse','AddShippingAdresse')->name('addshippingadresse');
        Route::post('/place-order','PlaceOrder')->name('placeorder');
        Route::get('/checkout','Checkout')->name('checkout');
        Route::get('/user-profile','UserProfile')->name('userprofile');
        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');


Route::middleware('auth','role:admin')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/admin/all-category','Index')->name('allcategory');
        Route::get('/admin/add-category','AddCategory')->name('addcategory');
        Route::post('/admin/store-category','StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}','EditCategory')->name('editcategory');
        Route::post('/admin/update-category','UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}','DeleteCategory')->name('deletecategory');
    });
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory','Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory','AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory','StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}','EditSubCategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory','UpdateSubCategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}','DeleteSubCategory')->name('deletesubcategory');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/all-products','Index')->name('allproducts');
        Route::get('/admin/add-product','AddProduct')->name('addproduct');
        Route::post('/admin/store-product','StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}','EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img','UpdateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}','EditProduct')->name('editproduct');
        Route::post('/admin/update-product','UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-poduct/{id}','DeleteProduct')->name('deleteproduct');
        
    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/pending-order','Index')->name('pendingorder');
        Route::post('/admin/changeorder-status/{id}','changeStatus')->name('changestaus');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
