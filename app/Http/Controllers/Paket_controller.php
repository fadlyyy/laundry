<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paket;

class Paket_controller extends Controller
{
    public function index(){
    	$title = 'Paket Laundry';
    	$data = Paket::get();

    	return view('paket.index',compact('title','data'));
    }

    public function add(){
    	$title = 'Tambah Paket Laundry';

    	return view('paket.add',compact('title'));
    }

    public function store(Request $request){
    	$data['id'] = \Uuid::generate(4);
    	$data['nama'] = $request->nama;
    	$data['harga'] = $request->harga;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	\Session::flash('sukses','Data berhasil ditambah');

    	Paket::insert($data);

    	return redirect('paket-laundry');
    }
}
