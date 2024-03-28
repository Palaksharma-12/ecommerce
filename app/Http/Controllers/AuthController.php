<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Mail\Testing;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\jobs\MyJob;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function auth_login(LoginRequest $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == "Blocked") {
                Auth::logout();
                // return redirect('login')->with('error', 'Your account is blocked.');
                return response()->json(['error' => 'Your account is blocked.'], 400);
            }
            if (Auth::check()) {
                // If the user is authenticated
                if (Auth::user()->type == 'customer') {
                    return response()->json(['redirect' => 'home'], 200);
                    
                    // return redirect('home');
                } elseif (Auth::user()->type == 'admin') {
                    return response()->json(['redirect' => 'admin'], 200);

                    // return redirect('admin');
                }
            } else {
                // If the user is not authenticated
                return redirect('login');
            }

            return redirect()->intended('home'); // Redirect to the intended page after successful login
        } 
        else {
            return response()->json(['error' => 'Email or password is incorrect.'], 400);

            // return redirect('login')->with('error', 'Email or password is incorrect.');
        }
    }

    public function create_user(RegistrationRequest $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'fullname' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
        // ]);

        // dump($request->password);
        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // User::updateOrCreate(['id' => $request->id],[
        //     'fullname' => $request->fullname,
        // ]);
// dd($request->password);

        $details=[
            'title' =>"You have been successfully logged in",
            "message" =>"Hello this a message",
        ];
        Myjob::dispatch($user,$request->password)->onConnection('database');

        // Mail::to($request->email)>send(new Testing($details));



        return response()->json(['redirect' => 'login'], 200);
        // return redirect('login')->with('success', 'Congratulations! Your account has been created.');
    }

   
    

    public function forgotPassword()
    {
        return view('Mails.forgot-password');
    }

    public function processForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(60);
        
        \DB::table('password_reset_tokens')->where('email',$request->email)->delete();
        \DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
        ]);
          // send emails here
        $user = User::where('email', $request->email)->first();
        $formData = [
            'token' => $token,
            'user' => $user,
            'mailSubject' => 'Reset Your Password',
        ];

        Mail::to($request->email)->send(new ResetPasswordEmail($formData));

        return redirect()->route('Mails.forgotPassword')->with('success', 'Please check your email to reset your password.');
    }
  
   public function resetPassword($token)
    {
      $tokenObj = \DB::table('password_reset_tokens')->where('token',$token)->first();

         if ($tokenObj == null){
         return redirect()->route('Mails.forgotPassword')->with('error','Invalid request');
    }
         return view('reset-password',[
        'token'=> $token
    ]);

   }

   public function processResetPassword(Request $request)
   {
    
       $token = $request->token;
       $tokenObj = \DB::table('password_reset_tokens')->where('token', $token)->first();

       if ($tokenObj == null) {
           return redirect()->route('Mails.forgotPassword')->with('error', 'Invalid request');
       }
       $user = User::where('email', $tokenObj->email)->first();


       $validator = Validator::make($request->all(), [
           'password' => 'required|min:8',
           'confirm_password' => 'required|same:password'
       ]);

    if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }

    User::where('id',$user->id)->update(
        [
            'password' => Hash::make($request->password)
        ]
        );
       $tokenObj = \DB::table('password_reset_tokens')->where('token', $token)->delete();
        return redirect('/login')->with('success','You have successfully updated your password');

//        // Remove the used token from the database
//        \DB::table('password_reset_tokens')->where('token', $token)->delete();

//        return redirect('/login')->with('success', 'Your password has been reset successfully. You can now login with your new password.');
   }

   public function index()
   {
       $allProducts=Product::all();
       $newArrival=Product::where('type','new-arrivals')->get();
       $hotSale=Product::where('type','sale')->get();
       return view('index',compact('allProducts','hotSale','newArrival',));
   }

   public function profile()
   {
    if (Auth::check()) {
        $user = Auth::user();
        return view('profile', compact('user'));
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




}