<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function Index(){
        $totalPrice = Order::where('status', 'confirmed')->sum('total_price');
        $userCount = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'user');
        })->count();
        $confirmedOrderCount = Order::where('status', 'confirmed')->count();
    
    return view('admin.dashboard', compact('totalPrice', 'userCount','confirmedOrderCount'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
