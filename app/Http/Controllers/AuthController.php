<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function _construct() {
        $this->middleware('auth:api',['except'=>['login','register']]);
    }

    public function viewlogin() {
        return view('login');
    }

    public function login(Request $request) {
        $validator =Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required|string|min:6'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->level == 'admin'){
                return redirect()->intended('admin')
                        ->withSuccess('You have Successfully loggedin');
            }elseif($user->level == 'karyawan') {
                return redirect()->intended('karyawan')
                        ->withSuccess('You have Successfully loggedin');
            }elseif($user->level == 'customer') {
                return redirect()->intended('customer')
                        ->withSuccess('You have Successfully loggedin');
            }
        }
        if($validator->fails()) {
            // return response()->json($validator->errors(),422);
            return Redirect::back()->withInput()->withErrors(['login_gagal' => 'These credentials do not match our records.']);
        }
        if(!$token=auth()->attempt($validator->validated())) {
            // return response()->json(['error'=>'Unauthorized'],401);
            return Redirect::back()->withInput()->withErrors(['login_gagal' => 'These credentials do not match our records.']);
        }
        return response()->json([
            'user'=>auth()->user()
        ]);
    }

    public function viewregister() {
        return view('register');
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'username'=>'required',
            'email'=>'required|string|email|unique:users',
            'level'=>'required',
            'password'=>'required|string|confirmed|min:6'
        ]);
        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors(['register_gagal' => 'registrasi gagal']);
            // return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return redirect("dashboard")->withInput()->withSuccess(['success' => 'User successfully registered']);
        
    }
    
    public function profile() {
        return response()->json(auth()->user());
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('auth/login');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
}

