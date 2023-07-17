<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function AddTable(){
        return view('Table.add');
    }
    public function AddTableStore(Request $request)
    {
        $tables = $request->all();
        Table::create($tables);
        return back()->withSuccess('Added');
    }
    public function EditTable($id)
    {
        $tables = Table::find($id);
        return view('Table.update', ['tables' => $tables]);
    }
    public function UpdateTable(Request $request)
    {
        $id = $request->id;
        $update = Table::find($id);
        $update->update($request->all());
        return redirect('/table');
    }
    public function DeleteTable($id)
    {
        Table::destroy($id);
        return back();
    }
}
