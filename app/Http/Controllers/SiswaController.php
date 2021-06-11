<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = SiswaModel::all();
        return view('siswa.index',['data_siswa'=>$data_siswa]);
    }

    public function create(Request $r)
    {
        //return "coba";
        return $r->all();
    }
}
