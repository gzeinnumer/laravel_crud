# laravel_crud
 Simple Laravel

---
### [PART 12](https://github.com/gzeinnumer/laravel_crud/tree/part_12)
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
$user->name="Zein"
>>> $user->name = "Zein"
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
### [PART 14](https://github.com/gzeinnumer/laravel_crud/tree/part_14)
---

```
Copyright 2021 M. Fadli Zein
```