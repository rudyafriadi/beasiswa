<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\University;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $idmahasiswa = Auth::user()->id;
        // $roleidmahasiswa = Auth::user()->role_id;
        if (auth::user()->role_id == 1 || auth::user()->role_id == 2) {
            $mahasiswa = Member::all();
        } else {
            $mahasiswa = Member::where('role_id','3')->get();
        }
        
        $universitas = University::all();
        $countmahasiswa = Member::where('status','0')->count();
        $countuserid = Member::where('user_id', $idmahasiswa)->count();
        // dd($countuserid);
        
        return view('backend.datamahasiswa',compact('mahasiswa','universitas','countmahasiswa','idmahasiswa','roleidmahasiswa','countuserid'));
    }

    public function simpan(Request $r)
    {
        $mahasiswa = new Member;
        $mahasiswa->nim = $r->input('nim');
        $mahasiswa->nama = $r->input('nama');
        $mahasiswa->alamat = $r->input('alamat');
        $mahasiswa->tpt_lahir = $r->input('tpt_lahir');
        $mahasiswa->tgl_lahir = $r->input('tgl_lahir');
        $mahasiswa->jkel = $r->input('jkel');
        $mahasiswa->th_masuk = $r->input('th_masuk');
        $mahasiswa->j_study = $r->input('j_study');
        $mahasiswa->user_id = $r->input('user_id');
        $mahasiswa->role_id = $r->input('role_id');
        $mahasiswa->university_id = $r->input('university_id');
        $mahasiswa->status = $r->input('status');

        $mahasiswa->save();
        return redirect()->route('member')->with('sukses','Data berhasil diinput');
    }

    public function cek(Request $r, $id)
    {
        $mahasiswa = Member::find($id);
        $countmahasiswa = Member::where('status','0')->count();
        return view('backend.verifikasi', compact('mahasiswa','countmahasiswa'));
    }

    public function verifikasi(Request $r, $id){
        $mahasiswa = Member::find($id);
        
        $mahasiswa->status = $r->input('status');

        $mahasiswa->save();
        return redirect('/mahasiswa')->with('sukses','Data berhasil diedit');
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
