@extends('layout.master')

@section('content')
    <h1>Edit Data Nahasiswa</h1>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <form action="/siswa/{{$data_siswa->id}}/update" method="POST">
                {{csrf_field()}}
                <div class="mb-3">
                    <label for="nama_depan" class="form-label">Nama Depan</label>
                    <input name="nama_depan" type="text" class="form-control" id="nama_depan" placeholder="Nama Depan" value="{{$data_siswa->nama_depan}}">
                </div>
                <div class="mb-3">
                    <label for="nama_belakang" class="form-label">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" placeholder="Nama Belakang" value="{{$data_siswa->nama_belakang}}">
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Pilih Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                        <option disabled>Jenis kelamin</option>
                        <option value="L" @if($data_siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                        <option value="P" @if($data_siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input name="agama" type="text" class="form-control" id="agama" placeholder="Agama" value="{{$data_siswa->agama}}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat">{{$data_siswa->alamat}}</textarea>
                </div>
                <div class="mb-3 float-end">
                    <a href="/siswa" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection