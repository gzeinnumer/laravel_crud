# laravel_crud
 Simple Laravel

---
#### PART 1
```
composer create-project laravel/laravel laravel_crud
```

---
#### PART 2
* laravel_crud\app\Providers
```php
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider{

    ...

    public function boot()
    {
        Schema::defaultStringLength(255);
    }
}
```

---
#### PART 3
```
//.env export SERVER_PORT="8080"
php artisan serve --port=8080
```
* laravel_crud\routes\web.php
```php
Route::get('/siswa', 'SiswaController@index');

//laravel 8
use App\Http\Controllers\UserController;
Route::get('/users', [UserController::class, 'index']);
// or
Route::get('/users', 'App\Http\Controllers\UserController@index');
```
```
php artisan make:controller SiswaController
```
* laravel_crud\app\Http\Controllers\SiswaController.php
```php
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        //return "ini list mahasiswa";
        return view('siswa.index');
    }
}
```
* laravel_crud\resources\views\siswa\index.blade.php
```php
<h3>hallo zein<h3>
```
```
http://127.0.0.1:8080/siswa
```

---
#### PART 4
```
php artisan make:model SiswaModel
```
* laravel_crud\app\Models\SiswaModel.php
```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
}
```
```php
<?php
use App\Models\SiswaModel;
class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = SiswaModel::all();
        return view('siswa.index',['data_siswa'=>$data_siswa]);
    }
}
```
* laravel_crud\resources\views\siswa\index.blade.php
```php
hallo zein
{{dd($data_siswa)}}
```
```
http://127.0.0.1:8081/siswa
```

---
#### PART 5
* laravel_crud\resources\views\siswa\index.blade.php
```php
<h1>Data Mahasiswa</h1>
<table>
    <tr>
        <th>Nama Depan</th>
        <th>Nama Belakang</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Alamat</th>
    </tr>
    @foreach($data_siswa as $d)
    <tr>
        <td>{{$d->nama_depan}}</td>
        <td>{{$d->nama_belakang}}</td>
        <td>{{$d->jenis_kelamin}}</td>
        <td>{{$d->agama}}</td>
        <td>{{$d->alamat}}</td>
    </tr>
    @endforeach
</table>
```
```php
http://127.0.0.1:8081/siswa
```

---
#### PART 6
* laravel_crud\resources\views\siswa\index.blade.php

https://getbootstrap.com/docs/5.0/content/tables/

https://stackoverflow.com/questions/18672452/left-align-and-right-align-within-div-in-bootstrap

```html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Data Mahasiswa</h1>
            </div>
            <div class="col-6 align-items-en">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                </tr>
                @foreach($data_siswa as $d)
                <tr>
                    <td>{{$d->nama_depan}}</td>
                    <td>{{$d->nama_belakang}}</td>
                    <td>{{$d->jenis_kelamin}}</td>
                    <td>{{$d->agama}}</td>
                    <td>{{$d->alamat}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
```

---
#### PART 7
* laravel_crud\resources\views\siswa\index.blade.php
```html
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/siswa/create" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input name="nama_depan" type="text" class="form-control" id="nama_depan" placeholder="Nama Depan" />
                    </div>
                    <div class="mb-3">
                        <label for="nama_belakang" class="form-label">Nama Belakang</label>
                        <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" placeholder="Nama Belakang" />
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                            <option selected disabled>Jenis kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input name="agama" type="text" class="form-control" id="agama" placeholder="Agama" />
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

```
* laravel_crud\routes\web.php
```php
Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'index']);
    Route::post('/create', [SiswaController::class, 'create']);
});
```
* laravel_crud\app\Http\Controllers\SiswaController.php
```php
<?php
class SiswaController extends Controller
{
    public function create(Request $r)
    {
        //return "coba";
        // return $r->all();
        SiswaModel::create($r->all());
        return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }
}
```
* laravel_crud\app\Models\SiswaModel.php
```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $fillable = ['nama_depan', 'nama_belakang','jenis_kelamin', 'agama','alamat'];
}
```

---
#### PART 8
* laravel_crud\resources\views\siswa\index.blade.php
```php
<table class="table table-hover">
    <tr>
        ...
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    @foreach($data_siswa as $d)
        <tr>
            ...
            <td>{{$d->alamat}}</td>
            <td><a href="/siswa/{{$d->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
        </tr>
    @endforeach
</table>
```
* laravel_crud\routes\web.php
```php
Route::prefix('siswa')->group(function () {
    ...
    Route::get('{id}/edit', [SiswaController::class, 'edit']);
    Route::post('{id}/update', [SiswaController::class, 'update']);
});
```
* laravel_crud\app\Http\Controllers\SiswaController.php
```php
<?php
class SiswaController extends Controller
{
    public function edit($id)
    {
        $siswa = SiswaModel::find($id);
        return view('siswa/edit');
    }

    public function update(Request $r, $id)
    {
        $data_siswa = SiswaModel::find($id);
        $data_siswa->update($r->all());
        return redirect('/siswa')->with('sukses','Data berhasil diupdate');
    }
}
```
```
http://127.0.0.1:8081/siswa
http://127.0.0.1:8081/siswa/1/edit
```


---

```
Copyright 2021 M. Fadli Zein
```