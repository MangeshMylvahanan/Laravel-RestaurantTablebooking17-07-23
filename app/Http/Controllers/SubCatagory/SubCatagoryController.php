<?php

namespace App\Http\Controllers\SubCatagory;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Subcatagory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SubCatagoryController extends Controller
{
    public function addSubcatagoryview(){
        $catagory = Catagory::all();
        return view('SubCatagory.add',['catagories' =>$catagory]);
    }
    public function AddSubCatagory(Request $request){
            $data = $request->all();
            Subcatagory::create($data);
            return back()->withSuccess('Added');
        
    }
    public function EditSubCatagory($id){
        $catagory = Subcatagory::find($id);
        return view('SubCatagory.update',['catagory' =>$catagory]);
    }
    public function UpdateSubCatagory(Request $request){
        $id = $request->id;
        $update = Subcatagory::find($id);
        $update->update($request->all());
        return redirect('/dishessubcatagoryadd');
    }
    public function DeleteSubCatagory($id){
        Subcatagory::destroy($id);
        return back();
    }
}
