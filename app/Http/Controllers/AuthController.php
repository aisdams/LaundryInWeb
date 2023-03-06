<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ChangePasswordRequest;

class AuthController extends Controller
{
    public function _construct() {
        $this->middleware('auth:api',['except'=>['login','register']]);
    }

    public function viewlogin() {
        return view('auth.login');
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
            }elseif($user->level == 'owner') {
                return redirect()->intended('owner')
                        ->withSuccess('You have Successfully loggedin');
            }
        }
        if($validator->fails()) {
            // return response()->json($validator->errors(),422);
            return Redirect::back()->withInput()->withErrors($validator)->with('msg', 'Something Wrong');
        }
        // if(!$token=auth()->attempt($validator->validated())) {
        //     // return response()->json(['error'=>'Unauthorized'],401);
        //     return Redirect::back()->withInput()->withErrors($validator)->with('msg', 'Something Wrong');
        // }
        return redirect("/dashboard")->withInput()->withSuccess(['success' => 'User successfully login']);
    }

    public function viewregister() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'email'=>'required|string|email|unique:users',
            'level'=>'required',
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
            return Redirect::back()->withInput()->withErrors($validator)->with('msg', 'Something Wrong');
            // return Redirect::back()->withInput()->withErrors(['register_gagal' => 'registrasi gagal']);
            
            // return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        
        // if($request->hasFile('avatar')){
    	// 	$avatar = $request->file('avatar');
        //     $filename = time().'.'.$request->avatar->extension();
        //     $filename = $request->avatar->getClientOriginalName();
        //     $request->avatar->storeAs('images',$filename,'public');
        //     Auth::user()->update(['avatar'=>$filename]);
        // }
        // if($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());
        //     $validator->avatar = $request->file('avatar')->getClientOriginalName();
        // }
        return redirect("auth/login")->withInput()->withSuccess(['success' => 'User successfully registered']);
        
    }
    // protected function deleteOldAvatar()
    // {
    //   if (auth()->user()->avatar){
    //     Storage::delete('/storage/images/'.auth()->user()->avatar);
    //   }
    // }

    public function profile() {
        return view('auth.userprofile');
    }

    public function changeprofile() {
        return view('auth.changeprofile');
    }

    public function updateprofile(ChangePasswordRequest $request) {
        $old_password = auth()->user()->password;
        $user_id = auth()->user()->id;
        $request->all();

        if (Hash::check($request->input('old_password'), $old_password)) {
            $user = User::find($user_id);
            $user->nama = $request['nama'];
            $user->email = $request['email'];
            $user->notelp = $request['notelp'];
            $user->password = Hash::make($request['password']);
            
            if ($user->save()) {
                return redirect("auth/profile")->with('success',' Change Profile Berhasil');
            }
        }else {
            return Redirect::back()->with('failed', 'Semua Gagal');
        }
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

