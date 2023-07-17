<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Dish;
use App\Models\Payment;
use App\Models\Subcatagory;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function viewProducts()
    {
        try {
            $products = Dish::all();
            return view('Admin.viewproducts', ['products' => $products]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view products in admin'], 500);
        }
    }
    public function AddDishes()
    {
        $dishes = Dish::all();
        return view('Admin.productsadd',['dishes' =>$dishes]);
    }
    public function AddDishesStore(Request $request)
    {
        try {
            Auth::check();
            $userId = Auth::user()->id;
            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $request->validate(['product_image' => 'required|image']);
                $extension = $image->getClientOriginalExtension();
                $imagename = time() . '.' . $extension;
                $image->move('uploads', $imagename);
            }
            if ($request->hasFile('product_images')) {
                $image = $request->file('product_images');
                $request->validate(['product_images' => 'required|image']);
                $extension = $image->getClientOriginalExtension();
                $imagenames = time() . '.' . $extension;
                $image->move('thumb img', $imagenames);
            }
            Dish::create([
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_discount' => $request->product_discount,
                'product_discountprice' => $request->product_discountprice,
                'product_description' => $request->product_description,
                'catagory' => $request->catagory,
                'subcatagory' => $request->subcatagory,
                'seller_name' => $userId,
                'delivery_days' => $request->delivery_days,
                'product_image' => $imagename,
                'product_images' => $imagenames,
            ]);

            return back()
                ->withSuccess('you have successfully added the product details! ');
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to add products'], 500);
        }
    }
    public function AddDishesCatagory()
    {
        $catagories = Catagory::all();
        return view('Admin.catagoriesadd',['catagories'=>$catagories]);
    }
    public function AddDishesSubcatagory()
    {
        $catagories = Subcatagory::all();
        return view('Admin.subcatagoriesadd',['catagories'=>$catagories]);
    }
    public function TableView()
    {
        $tables = Table::all();
        return view('Admin.table',['tables' =>$tables]);
    }
    public function Users()
    {
        try {
            $users = DB::table('users')->where('role', 2)->get();
            return view('Admin.userdetails', ['users' => $users]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view users in admin'], 500);
        }
    }
    public function Payments()
    {
        try {
            $payments = Payment::all();
            return view('Admin.payments', ['payments' => $payments]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to payments in admin'], 500);
        }
    }
    public function NewSellerRegister()
    {
        try {
            $users = DB::table('users')->where('role', 0)->get();
            return view('Admin.newsellerregisters', ['users' => $users]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view seller register in admin'], 500);
        }
    }
    public function RemoveSeller(Request $request)
    {
        try {
            $userId = $request->user_id;
            $user = User::destroy($userId);
            return back();
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to remove a seller'], 500);
        }
    }
    public function productedit($id)
    {
        try{
            $product = Dish::find($id);
            return view('Admin.productsedit',['product' => $product]);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to edit product details'], 500);
        }
    }
    
}
