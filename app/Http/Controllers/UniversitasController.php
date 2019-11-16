<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
use App\Member;

class UniversitasController extends Controller
{
    public function index()
    {
        $universitas = University::all();
        $countmahasiswa = Member::where('status','0')->count();
        return view('backend.universitas',compact('universitas','countmahasiswa'));
    }

    public function simpan(Request $r)
    {
        $universitas = new University;
        $universitas->nama_universitas = $r->input('nama_universitas');
        $universitas->status = $r->input('status');
        $universitas->alamat = $r->input('alamat');
        $universitas->akreditasi = $r->input('akreditasi');

        $universitas->save();
        return redirect()->route('universitas')->with('sukses','Data berhasil diinput');
    }

    public function edit($id){
        $universitas = University::find($id);
        return view('backend.edituniversitas',compact('universitas'));
    }

    public function update(Request $request, $id){
        $universitas = University::find($id);
        $universitas->update($request->all());
        return redirect()->route('universitas')->with('sukses','Data berhasil diinput');
    }

    public function delete($id){
        $universitas = University::find($id);
        $universitas->delete();
        return redirect()->route('universitas');
    }

}
