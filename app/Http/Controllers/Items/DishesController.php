<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Catagory;
use App\Models\Dish;
use App\Models\Subcatagory;
use App\Models\Table;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishesController extends Controller
{
    public function addDishview(){
        $catagories = Catagory::all();
        $subcatagories = Subcatagory::all();
        return view('Dish.add',compact('catagories','subcatagories'));
    }
    public function AddDish(Request $request){
        try {
            if ($request->hasFile('chef_image')) {
                $image = $request->file('chef_image');
                $request->validate(['chef_image' => 'required|image']);
                $extension = $image->getClientOriginalExtension();
                $imagename = time() . '.' . $extension;
                $image->move('chef', $imagename);
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $request->validate(['image' => 'required|image']);
                $extension = $image->getClientOriginalExtension();
                $imagenames = time() . '.' . $extension;
                $image->move('uploads', $imagenames);
            }
            Dish::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'cat_id' => $request->cat_id,
                'subcat_id' => $request->subcat_id,
                'chef' => $request->chef,
                'chef_image' => $imagename,
                'image' => $imagenames,
            ]);

            return back()
                ->withSuccess('you have successfully added the product details! ');
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to add products'], 500);
        }
        
    }
    public function EditDish($id){
        $dishes = Dish::find($id);
        $catagories = Catagory::all();
        $subcatagories = Subcatagory::all();
        return view('Dish.update',compact('dishes','catagories','subcatagories'));
    }
    public function UpdateDish(Request $request){
        $id = $request->id;
        $update = Dish::find($id);
        $update->update($request->all());
        return redirect('/dishesadd');
    }
    public function DeleteDish($id){
        Dish::destroy($id);
        return back();
    }
    public function TableBook(){
        // Auth::check();
        // $userId = Auth::user()->id;
        $tables = Table::all();
        return view('User.reservation',compact('tables'));
    }
    public function TableBookStore(Request $request){
        Auth::check();
        $userId = Auth::user()->id;
        $tables = Table::all();
        $data = $request->all();
        $orderPrefix = 'ORD';
            $timestamp = now()->format('YmdHis');
            $uniqueId = uniqid();
            $orderId = $orderPrefix . $timestamp . $uniqueId;
        Booking::create([
            'name' =>$request->name,
            'date' =>$request->date,
            'timeslot' =>$request->time,
            'email' =>$request->email,
            'user_id' =>$userId,
            'ord_id' =>$orderId,
        ]);
        return view('User.tablebooking',compact('tables','orderId'));
    }
    public function Tableorder(Request $request){
        // dd($request->all());
        $orderId = $request->ord_id;
        $tableno = $request->table_id;
        $amount = $request->amount;
        $items = Booking::where('ord_id',$orderId)->get();
        foreach($items as $item){
            $item->update(['table_no'=>$tableno , 'table_amount' =>$amount]);
            $currenttime = $item->timeslot;
        }
        $catagories = Catagory::all();
        $cat_id = null;
        foreach ($catagories as $catagory) {
            if ($currenttime <= $catagory->totime && $currenttime >= $catagory->fromtime) {
                $cat_id = $catagory->id;
                break;
            }
        }

        $dishes = collect();
        if ($cat_id) {
            $dishes = Dish::where('cat_id', $cat_id)->get();
        }
        return view('User.dishesshop',compact('dishes','orderId'));
        
        // return view('User.razorpayindex',compact('orderId','amount'));
    }
    public function Menu(){
        $dishes = Dish::all();
        return view('menu',compact('dishes'));
    }
}
