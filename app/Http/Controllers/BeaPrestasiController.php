<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Document;
use App\Member;
use App\User;

class BeaPrestasiController extends Controller
{
    public function index()
    {
        $mahasiswa = Document::all();
        $countmahasiswa = Member::where('status','0')->count();
        $userId = Auth::user()->id;
        // dd($userId);
        return view ('backend.beaprestasi', compact('countmahasiswa','userId','mahasiswa'));
    }
    
    public function upload()
    {
        $userId = Auth::user()->id;
        $countmahasiswa = Member::where('status','0')->count();
        $mahasiswa = Member::where('user_id',$userId);
        dd($mahasiswa);
        return view ('backend.beaprestasiupload', compact('countmahasiswa'));
    }
    
    public function save(Request $r, $id)
    {
        $prestasi = Document::find($id);
        // dd($prestasi);
        
        $prestasi->nama = $r->input('nama');
        $prestasi->nim = $r->input('nim');
        $prestasi->status = $r->input('status');
        $prestasi->tipe = $r->input('tipe');
        // $prestasi->member_id = $r->input('member_id');

        $this->validate($r,['file1'=> 'required|image|max:1024']);
        // $this->validate($r,['file2'=> 'required|image|max:1024']);
        // $this->validate($r,['file3'=> 'required|image|max:1024']);
        // $this->validate($r,['file4'=> 'required|image|max:1024']);
        // $this->validate($r,['file5'=> 'required|image|max:1024']);
        // $this->validate($r,['file6'=> 'required|image|max:1024']);
        // $this->validate($r,['file7'=> 'required|image|max:1024']);

        if ($r->hasfile('file1')){
            $file1 = $r->file1('file1');
            $extension = $file1->getClientOriginalExtension();
            $filename = $file1->getClientOriginalName();
            $file1->move(public_path('assets/file/', $filename));
            $prestasi->file1 = $filename;
        }

        // if ($r->hasfile('file2')){
        //     $file2 = $r->file('file2');
        //     $extension = $file2->getClientOriginalExtension();
        //     $filename = $file2->getClientOriginalName();
        //     $file2->move(public_path('assets/file/', $filename));
        //     $prestasi->file2 = $filename;
        // }

        // if ($r->hasfile('file3')){
        //     $file3 = $r->file('file3');
        //     $extension = $file3->getClientOriginalExtension();
        //     $filename = $file3->getClientOriginalName();
        //     $file3->move(public_path('assets/file/', $filename));
        //     $prestasi->file3 = $filename;
        // }

        // if ($r->hasfile('file4')){
        //     $file4 = $r->file('file4');
        //     $extension = $file4->getClientOriginalExtension();
        //     $filename = $file4->getClientOriginalName();
        //     $file4->move(public_path('assets/file/', $filename));
        //     $prestasi->file4 = $filename;
        // }

        // if ($r->hasfile('file5')){
        //     $file5 = $r->file('file5');
        //     $extension = $file5->getClientOriginalExtension();
        //     $filename = $file5->getClientOriginalName();
        //     $file5->move(public_path('assets/file/', $filename));
        //     $prestasi->file5 = $filename;
        // }

        // if ($r->hasfile('file6')){
        //     $file6 = $r->file('file6');
        //     $extension = $file6->getClientOriginalExtension();
        //     $filename = $file6->getClientOriginalName();
        //     $file6->move(public_path('assets/file/', $filename));
        //     $prestasi->file6 = $filename;
        // }

        // if ($r->hasfile('file7')){
        //     $file7 = $r->file('file7');
        //     $extension = $file7->getClientOriginalExtension();
        //     $filename = $file7->getClientOriginalName();
        //     $file7->move(public_path('assets/file/', $filename));
        //     $prestasi->file7 = $filename;
        // }
        
        // $viewnotulen->file = $file->getClientOriginalName();
        // $file->move(public_path('assets/file/'),$file->getClientOriginalName());

        $prestasi->save();
        return redirect('/datahasilnotulen')->with('sukses','Data berhasil diedit');
 
    }
}
