<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\University;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $idmahasiswa = Auth::user()->id;
        // $roleidmahasiswa = Auth::user()->role_id;
        if (auth::user()->role_id == 1 || auth::user()->role_id == 2) {
            $user = User::all();
        } else {
            $user = User::where('role_id','3')->get();
        }
        
        $universitas = University::all();
        $role = Role::all();
        $countmahasiswa = Member::where('status','0')->count();
        
        return view('backend.managemenuser',compact('user','universitas','countmahasiswa','idmahasiswa','roleidmahasiswa','role'));
    }

    public function simpan(Request $r){
        $this->validate($r, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password),
            'role_id' => $r->role_id,
        ]);
        return redirect()->route('user')->with('sukses','Data berhasil diinput');
    }

}
