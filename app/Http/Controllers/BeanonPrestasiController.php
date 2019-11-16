<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class BeanonPrestasiController extends Controller
{
    public function index()
    {
        $countmahasiswa = Member::where('status','0')->count();
        return view ('backend.beanonprestasi', compact('countmahasiswa'));
    }
}
