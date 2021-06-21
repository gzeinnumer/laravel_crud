# laravel_crud
 Simple Laravel

---
## PART 1
```
composer create-project laravel/laravel laravel_crud
```

---
## PART 2
* laravel_crud\app\Providers
```php
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider{

    ...

    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
```

---
## PART 3
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
## PART 4
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
## PART 5
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
```
http://127.0.0.1:8081/siswa
```

---
## PART 6
* laravel_crud\resources\views\siswa\index.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_6/resources/views/siswa/index.blade.php)

https://getbootstrap.com/docs/5.0/content/tables/

https://stackoverflow.com/questions/18672452/left-align-and-right-align-within-div-in-bootstrap

---
## PART 7
* laravel_crud\resources\views\siswa\index.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_7/resources/views/siswa/index.blade.php) Add Modal

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
## PART 8
* laravel_crud\resources\views\siswa\index.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_8/resources/views/siswa/index.blade.php) Add Aksi
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
## PART 9
* laravel_crud\resources\views\layout\master.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_9/resources/views/layout/master.blade.php)

* laravel_crud\resources\views\siswa\index.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_9/resources/views/siswa/index.blade.php)

* laravel_crud\resources\views\siswa\edit.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_9/resources/views/siswa/edit.blade.php)

---
## PART 10
* laravel_crud\routes\web.php
```php
Route::prefix('siswa')->group(function () {
    ...
    Route::post('{id}/detele', [SiswaController::class, 'delete']);
});
```
* laravel_crud\resources\views\siswa\index.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_9/resources/views/siswa/index.blade.php)

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
            <td>
                <a href="/siswa/{{$d->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="/siswa/{{$d->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
```
* laravel_crud\app\Http\Controllers\SiswaController.php
```php
<?php
class SiswaController extends Controller
{
    public function delete(Request $r, $id)
    {
        $data_siswa = SiswaModel::find($id);
        $data_siswa->delete();
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');
    }
}
```
```
http://localhost:8081/siswa
```

---
## PART 11
* laravel_crud\app\Http\Controllers\SiswaController.php
```php
<?php
class SiswaController extends Controller
{
    public function index(Request $r)
    {
        if($r->has('cari')){
            $data_siswa = SiswaModel::where('nama_depan','LIKE','%'.$r->cari.'%')->get();
        } else{
            $data_siswa = SiswaModel::all();
        }
        return view('siswa.index',['data_siswa'=>$data_siswa]);
    }
}
```
```
http://localhost:8081/siswa?cari=R
```

---
## PART 12
Download dan Copy folder `assets` didalam folder dan paste dalam folder `public` di project `laravel_crud`
```
https://www.themeineed.com/free-download/?did=30520&file=3
```
* laravel_crud\resources\views\layout\master.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_12/resources/views/layout/master.blade.php)

* laravel_crud\resources\views\layout\include\_footer.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_12/resources/views/layout/include/_footer.blade.php)

* laravel_crud\resources\views\layout\include\_navbar.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_12/resources/views/layout/include/_navbar.blade.php)

* laravel_crud\resources\views\layout\include\_sidebar.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_12/resources/views/layout/include/_sidebar.blade.php)

* laravel_crud\resources\views\siswa\index.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_12/resources/views/siswa/index.blade.php)

* laravel_crud\resources\views\siswa\edit.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_12/resources/views/siswa/edit.blade.php)

---
## PART 13
* laravel_crud\routes\web.php
```php
Route::get('/dashboard', [DashboardController::class, 'index']);
```
```
php artisan make:controller DashboardController
```
* laravel_crud\app\Http\Controllers\DashboardController.php
```php
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
```
* laravel_crud\resources\views\home.blade.php
```php
hallo zein
```
* laravel_crud\resources\views\dashboard\index.blade.php
```php
@extends('layout.master') 

@section('content')
    Dasboard
@endsection
```
```
php artisan make:controller AuthController
php artisan migrate
//jika ada error ganti 255 jadi 191
```
```
php artisan tinker
$user = new \App\Models\User;
App\Models\User {#3419}
$user->name = "Zein"                                                                                                                                    >>> $user->name = "Zein"
=> "Zein"
$user->email = "zein@gmail.com"
=> "zein@gmail.com"
$user->password = bcrypt('rahasia')
=> "$2y$10$CcKFHGZ.dZmNFaL5I160DuLnydgCcFiEP47VgHhe48EG2fmuM1ddC"
$user->remember_token = "9uQ3MqQPp7WeCw3lE8IysGBsuscGdz3aXBQ8r8soDEAdTftidaP4zdf0Xlw3"
=> "9uQ3MqQPp7WeCw3lE8IysGBsuscGdz3aXBQ8r8soDEAdTftidaP4zdf0Xlw3"
$user->save()
=> true
```
* laravel_crud\app\Http\Controllers\DashboardController.php
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
```
* laravel_crud\app\Http\Controllers\AuthController.php
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $r)
    {
        //dd($r->all());
        if(Auth::attempt($r->only('email','password'))){
            return redirect('/dashboard');
        } 
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
```
* laravel_crud\resources\views\auth\login.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_13/resources/views/auth/login.blade.php)

* laravel_crud\resources\views\layout\include\_navbar.blade.php
[**See File**](https://github.com/gzeinnumer/laravel_crud/blob/part_13/resources/views/layout/include/_navbar.blade.php)

* laravel_crud\routes\web.php
```php
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('home');
// });

Route::prefix('/')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('postLogin', [AuthController::class, 'postLogin']);
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index']);
        Route::post('/create', [SiswaController::class, 'create']);
        Route::get('{id}/edit', [SiswaController::class, 'edit']);
        Route::post('{id}/update', [SiswaController::class, 'update']);
        Route::get('{id}/delete', [SiswaController::class, 'delete']);
    });
});
```

---

```
Copyright 2021 M. Fadli Zein
```