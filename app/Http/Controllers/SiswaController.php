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
        // return $r->all();
        SiswaModel::create($r->all());
        return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }

    public function edit($id)
    {
        $data_siswa = SiswaModel::find($id);
        return view('siswa/edit', ['data_siswa'=>$data_siswa]);
    }

    public function update(Request $r, $id)
    {
        $data_siswa = SiswaModel::find($id);
        $data_siswa->update($r->all());
        return redirect('/siswa')->with('sukses','Data berhasil diupdate');
    }

    public function delete(Request $r, $id)
    {
        $data_siswa = SiswaModel::find($id);
        $data_siswa->delete();
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');
    }
}
