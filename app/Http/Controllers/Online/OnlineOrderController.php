<?php

namespace App\Http\Controllers\Online;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnlineOrderController extends Controller
{
    public function Home(){
        return view('Online.master');
    }
}
