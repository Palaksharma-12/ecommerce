<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Admin Routes
// Route::get('/admin',[AdminController::class,'index']);

 Route::middleware('languageinsert')->group(function(){
Route::post('lang',[LanguageController::class, 'setLanguage']);

Route::get('/adminProducts',[AdminController::class,'products']);
Route::post('/AddNewPRODUCT',[AdminController::class,'AddNewPRODUCT']);
Route::post('/AddNewCustomer',[AdminController::class,'AddNewCustomer']);
Route::post('/UpdateProduct',[AdminController::class,'UpdateProduct']);
Route::post('/EditCustomer',[AdminController::class,'EditCustomer']);
Route::get('/deleteProduct/{id}',[AdminController::class,'deleteProduct']);
Route::get('/deleteOrder/{id}',[AdminController::class,'deleteOrder']);
Route::get('/customerdelete/{id}',[AdminController::class,'customerdelete']);
Route::get('/changeUserStatus/{status}/{id}',[AdminController::class,'changeUserStatus']);
Route::get('/changeOrderStatus/{status}/{id}',[AdminController::class,'changeOrderStatus']);
Route::get('/ourCustomers',[AdminController::class,'ourCustomers']);
Route::get('/ourOrders',[AdminController::class,'orders']);
Route::get('/adminProfile',[AdminController::class,'profile']);
Route::post('/updateUser',[AdminController::class,'updateUser']);

Route::get('/testMail',[MainController::class,'testMail']);

//Customer Routes
// Route::get('home',[AuthController::class,'index']);
Route::get('/shop',[MainController::class,'shop']);
// Route::get('/profile',[AuthController::class,'profile']);
 Route::post('/updateUser',[AuthController::class,'updateUser']);
 Route::get('/single/{id}',[MainController::class,'singleProduct']);
Route::get('/myOrders',[MainController::class,'myOrders']);

Route::post('/addToCart',[MainController::class,'addToCart']);
Route::get('/deleteCartItem/{id}',[MainController::class,'deleteCartItem']);
Route::post('/updateCart',[MainController::class,'updateCart']);
// Route::get('/cart',[MainController::class,'cart']);
Route::get('/checkout',[MainController::class,'checkout']);


    Route::get('/login',[AuthController::class,'login']);
    
     Route::post('/auth_login',[AuthController::class,'auth_login']);
     Route::get('/register',[AuthController::class,'register']);
     Route::post('/create_user',[AuthController::class,'create_user']);
     Route::get('/forgot-password',[AuthController::class,'forgotPassword'])->name('Mails.forgotPassword');
     Route::post('/process-forgot-password',[AuthController::class,'processForgotPassword'])->name('Mails.processForgotPassword');
     Route::get('/reset-password/{token}',[AuthController::class,'resetPassword'])->name('Mails.resetPassword');
     Route::post('/process-reset-password',[AuthController::class,'processResetPassword'])->name('processResetPassword');
     Route::get('/logout',[AuthController::class,'logout']);
    

   Route::group(['middleware' => 'authuser'],function(){

     Route::get('home',[AuthController::class,'index']);
     Route::get('/deleteCartItem/{id}',[MainController::class,'deleteCartItem']);
     Route::get('/cart',[MainController::class,'cart']);
    //  Route::get('/checkout',[MainController::class,'checkout']);
     Route::get('/profile',[AuthController::class,'profile']);
     
   });
   
   Route::group(['middleware' => 'adminuser'],function(){

    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/ourCustomers',[AdminController::class,'ourCustomers']);
    Route::get('/adminProducts',[AdminController::class,'products']);
   });
   
   });



