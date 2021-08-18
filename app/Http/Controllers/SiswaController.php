<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    public function index(Request $r)
    {
        if ($r->has('cari')) {
            $data_siswa = SiswaModel::where('nama_depan', 'LIKE', '%' . $r->cari . '%')->get();
        } else {
            $data_siswa = SiswaModel::all();
        }
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $r)
    {
        SiswaModel::create($r->all());
        return redirect('/siswa')->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $data_siswa = SiswaModel::find($id);
        return view('siswa/edit', ['data_siswa' => $data_siswa]);
    }

    public function update(Request $r, $id)
    {
        $data_siswa = SiswaModel::find($id);
        $data_siswa->update($r->all());
        if ($r->hasFile('avatar')) {
            $r->file('avatar')->move('images/', $r->file('avatar')->getClientOriginalName());
            $data_siswa->avatar = $r->file('avatar')->getClientOriginalName();
            $data_siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete(Request $r, $id)
    {
        $data_siswa = SiswaModel::find($id);
        $data_siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function profile($id)
    {
        $siswa = SiswaModel::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }
}
