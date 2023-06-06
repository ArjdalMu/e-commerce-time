<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index(){
        $pending_orders = Order::where('status','pending')->latest()->get();
        return view('admin.pendingorders',compact('pending_orders'));
    }

    public function changeStatus($orderId)
{
    // Find the order by its ID
    $order = Order::find($orderId);

    if ($order) {
        // Update the order status to 'confirmed'
        $order->status = 'confirmed';
        $order->save();

        // Redirect or perform other actions as needed

        // Return a success message
        return redirect()->back()->with('message', 'Order status changed successfully.');
    } else {
        // Order not found
        return redirect()->back()->with('message', 'Order not found.');
    }
}
}
