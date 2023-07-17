<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Catagory;
use App\Models\Dish;
use App\Models\Payment;
use App\Models\Subcatagory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function Login()
    {
        return view('Auth.login');
    }
    public function home()
    {
        $user = Auth::user();
        $currenttime = '13:00:00' ; //Carbon::now()->format('H:i:s');
        $catagories = Catagory::all();
        $items = Dish::all();

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

        $subcatagories = Subcatagory::all();

        // dd($catagories, $subcatagories, $dishes, $currenttime, $cat_id);

        return view('User.homepage', compact('catagories', 'subcatagories', 'dishes','items'));
    }
    public function authenticate(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            $user = User::where('email', $email)->first();

            if ($user && password_verify($password, $user->password)) {
                $role = $user->role;

                if ($role == 1) {
                    Auth::login($user);
                    Session::put('user', $user);
                    return redirect('/admin');
                } elseif ($role == 2) {
                    Auth::login($user);
                    Session::put('user', $user);
                    return redirect('/');
                }
            }

            return back()->withErrors(['message' => 'Invalid credentials.']);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to authenticate user'], 500);
        }
    }


    public function Admin()
    {
        return view('Admin.dashboard');
    }
    public function GoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function LoginWithGoogle()
    {
        // try {
        $user = Socialite::driver('google')->stateless()->user();
        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {
            $role = $finduser->role;

            if ($role == 1) {
                Auth::login($finduser);
                Session::put('user', $user);
                return redirect('/admin');
            } elseif ($role == 2) {
                Auth::login($finduser);
                Session::put('user', $user);
                return redirect('/');
            }
        } else {
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->password = bcrypt('123456');
            $new_user->role = '2';
            $new_user->google_id = $user->id;
            $new_user->save();
            return redirect('/');
        }
        // } catch (QueryException $e) {
        //     return response()->json(['message' => 'Failed to google login user'], 500);
        // }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
    public function UserRegister()
    {
        return view('Auth.register');
    }
    public function UserRegisterStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                return response()->json(['message' => 'validator fails']);
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $user->google_id = $request->email;
            $user->role = '2';
            $user->save();
            return redirect('/login');
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }
    public function MyOrders(){
        // dd("haiii..");
        $userId = Auth::user()->id;
        $payments = Payment::where('user_id',$userId)->get();
        return view('myorders',compact('payments'));

    }
}
