<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Testing;



class AdminController extends Controller
{
    public function index()
    {
       
      return view('Dashboard.index'); 
    }
    public function profile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('Dashboard.profile', compact('user'));
        } else {
            // Handle case where user is not logged in
            return redirect('login')->with('error', 'Please login to view your profile');
        }
    }

    public function updateUser(Request $data)
{
    $user = auth()->user();
    $user->fullname = $data->input('fullname');
    $user->email = $data->input('email');
    if ($user->save()) {
        return redirect('login')->with('success', 'Congratulations! Your account has been updated');
    } else {
        return redirect()->back()->with('error', 'Failed to update account. Please try again.');
    }
}

    public function changeUserStatus ($status,$id)
    {  
        $user=User::find($id);
        $user->status=$status;
        $user->save();
        return redirect()->back()->with('success','Congratulation!  User status updated Successfully');
     }

   

     public function products()
     {
         $products=Product::all();
         return view ('Dashboard.products',compact('products'));
     }
    

    public function UpdateProduct(Request $data)
    {
        // dd($data->all());
        $product=Product::find($data->input('id'));
        $product->title = $data->input('title');
        $product->price = $data->input('price');
        $product->description = $data->input('description');
        $product->quantity = $data->input('quantity');
        $product->type = $data->input('type');
        $product->category = $data->input('category');
        if($data->file('file')!=null)
        {
        $product->picture=$data->file('file')->getClientOriginalName();
        $data->file('file')->move('Source/products/',$product->picture); 
        }
         
         $product->save();
        return redirect()->back()->with('success','Congratulation!  Product Listing Updated Successfully');
    }
    
    
    public function AddNewPRODUCT(Request $data)
    {
        $product=new Product();
        $product->title=$data->input('title');
        $product->price=$data->input('price');
        $product->description=$data->input('description');
        $product->quantity=$data->input('quantity');
        $product->type=$data->input('type');
        $product->category=$data->input('category');
        
        $product->picture=$data->file('file')->getClientOriginalName();
        $data->file('file')->move('Source/products/',$product->picture); 
        
       
        $product->save();
        return redirect()->back()->with('success','Congratulation! New product Listed Successfully');
    }


    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Congratulation!  Product Listed Deleted Successfully');
        
    }
   



    public function ourCustomers()
    {
        $customers=User::get();
        return view ('Dashboard.customers',compact('customers'));
    }


    public function AddNewCustomer(Request $data)
    {
        $user=new User();
        $user->fullname=$data->fullname;
        $user->email=$data->email;
        $user->password=$data->password;
        $user->type=$data->type;
        $user->status=$data->status;
        // $user->status=$data->input('status');
        // $user->fullname = $request->fullname;
        
        $user->save();
        $details=[
            'title' =>"You have been successfully logged in",
            "message" =>"Hello this a message",
        ];
        Mail::to($data->email)->send(new Testing($details));

        return redirect()->back()->with('success','Congratulation! New product Listed Successfully');
    }

    
    public function EditCustomer(Request $data)
    {
        // dd($data->all());
      
         $user=User::find($data->input('id'));
         $user->fullname = $data->input('fullname');
         $user->email = $data->input('email');
         $user->password = $data->input('password');
         $user->type = $data->input('type');
         $user->status = $data->input('status');

        

         $user->save();
        
        return redirect()->back()->with('success','Congratulation!  Product Listing Updated Successfully');
    }
    public function customerdelete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success','Congratulation!  Customer Deleted Successfully');
        
    }
   
  
   
    // public function orders()
    // {
    //          $orderItems=DB::table('order_items')
    //         ->join('products','order_items.productId','products.id')
    //         ->select('products.title','products.picture','order_items.*')
    //         ->get();
    //         $orders=DB::table('users')
    //         ->join('orders','orders.customer_id','users.id')
    //         ->select('orders.*','users.fullname','users.email','users.status as userStatus')
    //         ->get();
    //        return view('Dashboard.orders',compact('orders','orderItems'));
    
    // } 
    public function orders()
     {
          $orders = Order::with('orderItems', 'customer')->get();
    
          return view('Dashboard.orders', compact('orders'));
     }


    public function changeOrderStatus ($status,$id)
    {  
        $orderItems=OrderItem::all();
        $order=Order::find($id);
        $order->status=$status;
        $order->save();
        return redirect()->back()->with('success','Congratulation!  Order status updated Successfully');
     }
     
     public function deleteOrder($id)
    {
        $order=Order::find($id);
        $order->delete();
        return redirect()->back()->with('success','Congratulation!  Order Listed Deleted Successfully');
        
    }
 
    
    
    
}
