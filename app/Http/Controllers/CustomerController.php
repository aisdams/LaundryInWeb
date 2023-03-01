<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        $data = customer::paginate(10);
        return view('customers.index', compact('data'));
    }

    public function create(){
        return view('customers.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
        ]);
        customer::create($request->all());   
        return redirect()->route('data-customer');
    }
}
