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
            return Redirect::back()->withInput()->withErrors($validator->errors())->with('msg', 'Something Wrong');
        }
        if(!$token=auth()->attempt($validator->validated())) {
            // return response()->json(['error'=>'Unauthorized'],401);
            return Redirect::back()->withInput()->withErrors($validator->errors())->with('msg', 'Something Wrong');
        }
        return redirect("/dashboard")->withInput()->withSuccess(['success' => 'User successfully login']);
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
            'avatar'=>'required|image|mimes:png,jpg,jpeg|max:2048',
            'notelp'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:6',             // must be at least 6 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'password_confirmation'=>'required|same:password'
        ]);
        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->errors())->with('msg', 'Something Wrong');
            // return Redirect::back()->withInput()->withErrors(['register_gagal' => 'registrasi gagal']);
            
            // return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        
        if($request->hasFile('avatar')){
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('images',$filename,'public');
            Auth()->user()->update(['avatar'=>$filename]);
        }
        // if($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());
        //     $validator->avatar = $request->file('avatar')->getClientOriginalName();
        // }
        return redirect("auth/login")->withInput()->withSuccess(['success' => 'User successfully registered']);
        
    }
    
    public function profile() {
        return view('userprofile');
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

