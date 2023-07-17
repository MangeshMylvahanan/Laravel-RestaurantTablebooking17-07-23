<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Catagory\CatagoryController;
use App\Http\Controllers\Items\DishesController;
use App\Http\Controllers\Online\OnlineOrderController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\SubCatagory\SubCatagoryController;
use App\Http\Controllers\Table\TableController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    //admin
    Route::get('/admin', [UserController::class, 'Admin'])->name('admin');
    Route::get('/viewproducts', [AdminController::class, 'viewProducts']);
    Route::get('/users', [AdminController::class, 'Users']);
    Route::get('/viewpayments', [AdminController::class, 'Payments']);
    Route::get('/newsellerregister', [AdminController::class, 'NewSellerRegister']);
    Route::get('/addseller', [AdminController::class, 'AddSeller'])->name('add-seller');
    Route::get('/removeseller', [AdminController::class, 'RemoveSeller'])->name('remove-seller');
    Route::get('/sellerdetails', [AdminController::class, 'Sellers']);
    Route::post('/productedit/{id}', [AdminController::class, 'productedit']);
    Route::post('/productupdate/{id}', [AdminController::class, 'productupdate']);
    Route::get('/dishesadd', [AdminController::class, 'AddDishes']);
    Route::get('/dishescatagoryadd', [AdminController::class, 'AddDishesCatagory']);
    Route::get('/dishessubcatagoryadd', [AdminController::class, 'AddDishesSubcatagory']);
    Route::get('/table', [AdminController::class, 'TableView']);
    //catagory crud
    // Route::get('/addcatagory',function(){
    //     return view('Catagory.addcatagory');
    // });
    Route::post('/addcatagory', [CatagoryController::class, 'AddCatagory']);
    Route::get('/editcatagory/{id}', [CatagoryController::class, 'EditCatagory']);
    Route::post('/updatecatagory', [CatagoryController::class, 'UpdateCatagory']);
    Route::get('/deletecatagory/{id}', [CatagoryController::class, 'DeleteCatagory']);
    //subcatagory crud
    Route::get('/addsubcatagory', [SubCatagoryController::class, 'addSubcatagoryview']);
    Route::post('/addsubcatagory', [SubCatagoryController::class, 'AddSubCatagory']);
    Route::get('/editsubcatagory/{id}', [SubCatagoryController::class, 'EditSubCatagory']);
    Route::post('/updatesubcatagory', [SubCatagoryController::class, 'UpdateSubCatagory']);
    Route::get('/deletesubcatagory/{id}', [SubCatagoryController::class, 'DeleteSubCatagory']);
    //dishes crud
    Route::get('/adddish', [DishesController::class, 'addDishview']);
    Route::post('/adddish', [DishesController::class, 'AddDish']);
    Route::get('/editdish/{id}', [DishesController::class, 'EditDish']);
    Route::post('/updatedish', [DishesController::class, 'UpdateDish']);
    Route::get('/deletedish/{id}', [DishesController::class, 'DeleteDish']);
    //tables crud
    Route::get('/addtable', [TableController::class, 'AddTable']);
    Route::post('/addtable', [TableController::class, 'AddTableStore']);
    Route::get('/edittable/{id}', [TableController::class, 'Edittable']);
    Route::post('/updattable', [TableController::class, 'UpdateTable']);
    Route::get('/deletetable/{id}', [TableController::class, 'DeleteTable']);
    Route::get('/', [UserController::class, 'home'])->name('home');
    Route::get('/tablebooking', [DishesController::class, 'TableBook'])->name('tablebook');
    Route::post('/tablebooking', [DishesController::class, 'TableBookStore'])->name('tablebookstore');
    Route::post('/tableorder', [DishesController::class, 'Tableorder'])->name('tableorder');
    Route::post('/add-to-cart', [CartController::class, 'AddToCart'])->name('addtocart');
    Route::get('/cart/{id}', [CartController::class, 'Cart'])->name('cart');
    Route::get('/myorders', [UserController::class, 'MyOrders'])->name('myorders');
});




// Route::view('/home', 'User.homepage');
Route::get('/login', [UserController::class, 'Login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('login/google', [UserController::class, 'GoogleRedirect']);
Route::get('login/google/callback', [UserController::class, 'LoginWithGoogle']);
Route::get('/register', [UserController::class, 'UserRegister']);
Route::post('/register', [UserController::class, 'UserRegisterStore']);
Route::get('/logout', [UserController::class, 'logout']);

// Route::get('/tableorder', function () {
//     return view('User.dishesshop');
// });
Route::post('/pay', [PaymentController::class, 'RazorView']);
Route::post('payment', [PaymentController::class, 'RazorPayStore'])->name('RazorPayStore');
Route::get('/invoice', [PaymentController::class, 'Invoice'])->name('invoice');


Route::get('orderonline',[OnlineOrderController::class,'Home'])->name('OnlineHomePage');
Route::get('/menu',[DishesController::class,'Menu']);