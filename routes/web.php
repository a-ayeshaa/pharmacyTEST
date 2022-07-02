<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagerController;

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

Route::get('/', function () {
    return view('welcome');
});

//ALL USERS

Route::get('/registration',[AllUserController::class,'registration'])->name('user.registration');
Route::post('/registration',[AllUserController::class,'registrationSubmit'])->name('user.registration.submit');

Route::get('/registration/{type}',[AllUserController::class,'register'])->name('user.register');
Route::post('/registration/{type}',[AllUserController::class,'registerSubmit'])->name('user.register.submit');

Route::get('/login',[AllUserController::class,'login'])->name('user.login');
Route::post('/login',[AllUserController::class,'loginSubmit'])->name('user.login.submit');

Route::get('/logout',[AllUserController::class,'logout'])->name('logout');

//CUSTOMER
Route::get('/customer/home',[CustomerController::class,'customerHome'])->name('customer.home');
Route::get('/customer/account/{name}',[CustomerController::class,'customerAccount'])->name('customer.account');

Route::get('/customer/account/modify/{name}',[CustomerController::class,'customerModifyAccount'])->name('customer.modify.account');
Route::post('/customer/account/modify/{name}',[CustomerController::class,'customerModifiedAccount'])->name('customer.modified.account');


Route::get('/customer/show/MedicineList',[CustomerController::class,'showMed'])->name('customer.show.med');
Route::post('/customer/show/MedicineList',[CustomerController::class,'addToCart'])->name('customer.add.to.cart');

Route::get('/customer/cart',[CustomerController::class,'showCart'])->name('customer.show.cart');
Route::post('/customer/cart',[CustomerController::class,'confirmOrder'])->name('customer.confirm.order');

Route::get('/customer/cart/remove/{item_id}',[CustomerController::class,'deleteItem'])->name('customer.delete.from.cart');

Route::get('/customer/clearcart',[CustomerController::class,'clearCart'])->name('customer.clear.cart');

Route::get('/customer/checkout',[CustomerController::class,'checkOut'])->name('customer.check.out');


//MANAGER
Route::get('/manager/home',[ManagerController::class,'managerHome'])->name('manager.home');
Route::post('/manager/home',[ManagerController::class,'HomeAction'])->name('manager.HomeAction');

Route::get('/manager/table/select',[ManagerController::class,'tableSelect'])->name('manager.tableSelect');
Route::post('/manager/table/select',[ManagerController::class,'viewTable'])->name('manager.tableView');

