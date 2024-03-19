<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\Testing;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class MainController extends Controller
{
    public function index()
    {
        $allProducts=Product::all();
        $newArrival=Product::where('type','new-arrivals')->get();
        $hotSale=Product::where('type','sale')->get();
        return view('index',compact('allProducts','hotSale','newArrival',));
    }
    

    public function shop()
    {
        return view('shop');
    }
    public function singleProduct($id)
    {
        $product=Product::find($id);
        // dd($product);
        return view('singleProduct',compact('product'));
    }

    public function addToCart(Request $data)
    {
        
        if(auth()->check())
        {

            
            // dd($data->all());
            $item = new Cart();
            $item->quantity = $data->input('quantity');
            $item->productId = $data->input('id');
            $item->customerId = auth()->id(); // Using auth()->id() to get the authenticated user's ID
            $item->save();
            return redirect()->back()->with('success', 'Congratulations! Item added into cart');
        } 
        else {
            return redirect('login')->with('error', 'Info! Please login to the system');
        } 
       
    }
    
    //  public function cart()
    // {
    //     $cartItems = DB::table('products')
    //         ->join('carts', 'carts.productId', '=', 'products.id')
    //         ->select('products.title','products.quantity as pQuantity', 'products.price', 'products.picture', 'carts.*')
    //         ->where('carts.customerId', auth()->id()) // Specify the condition for the customer_id
    //         ->get();
    
    //     return view('cart', compact('cartItems'));
    // }
    public function cart()
{
    $cartItems = Product::whereHas('cart', function ($query) {
            $query->where('customerId', auth()->id());
        })->get();

    return view('cart', compact('cartItems'));
}
    public function deleteCartItem($id)
    {
        $item=Cart::find($id);
        $item->delete();
        return redirect()->back()->with('success', 'One item has been deleted from cart');
    }
    public function updateCart(Request $data)
    {
        if(auth()->check())
        {
            $item =Cart::find($data->input('id'));
            $item->quantity = $data->input('quantity');
            $item->save();
            return redirect()->back()->with('success', 'Congratulations! Item  quantity updated ');
        } 
        else {
            return redirect('login')->with('error', 'Info! Please login to the system');
        } 
    }


// public function myOrders()
// {
//     if (Auth::check()) {
//         $orders = Order::where('customer_id', Auth::id())->get();
//         $items=DB::table('products')
//         ->join('order_items','order_items.productId','products.id')
//         ->select('products.title','products.picture','order_items.*')
//         ->get();
//         return view('orders', compact('orders','items'));
//     }
    
//     return redirect('login');
// }

public function myOrders()
{
    if (Auth::check()) {
        $orders = Order::with('OrderItems.product')
                        ->where('customer_id', Auth::id())
                        ->get();

        // dd($orders);
        return view('orders', compact('orders'));
    }
    
    return redirect('login');
}


   
    public function checkout(Request $request)
{
    // Check if the user is authenticated
    if (Auth::check()) {
        $order = new Order();
        $order->status = "Pending";
        $order->customer_id = Auth::id(); // Use Auth::id() to get the authenticated user's ID
        $order->bill = $request->input('bill');
        $order->address = $request->input('address');
        $order->fullname = $request->input('fullname');
        $order->phone = $request->input('phone');
        if ($order->save()) {
            $carts = Cart::where('customerId', Auth::id())->get();
            foreach ($carts as $item) {
                $product = Product::find($item->productId);
                $orderItem = new OrderItem();
                $orderItem->productId = $item->productId;
                $orderItem->quantity = $item->quantity;
                $orderItem->price = $product->price;
                $orderItem->orderId = $order->id;
                $orderItem->save();
                $item->delete();
            }
        }
        return redirect()->back()->with('success', 'Congratulations! Your order has been placed successfully.');
    } else {
        return redirect('login')->with('error', 'Info! Please login to the system.');
    }
}
}

   
        
    
   
    

   
      

