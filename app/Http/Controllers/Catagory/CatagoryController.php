<?php

namespace App\Http\Controllers\Catagory;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function AddCatagory(Request $request){
            $data = $request->all();
            Catagory::create($data);
            return back()->withSuccess('Added');
    }
    public function EditCatagory($id){
        $catagory = Catagory::find($id);
        return view('Catagory.updatecatagory',['catagory' =>$catagory]);
    }
    public function UpdateCatagory(Request $request){
        $id = $request->cat_id;
        $update = Catagory::find($id);
        $update->update($request->all());
        return redirect('/dishescatagoryadd');
    }
    public function DeleteCatagory($id){
        Catagory::destroy($id);
        return back();
    }
}
