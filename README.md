# laravel_crud
 Simple Laravel

#
#### part 1
```
composer create-project laravel/laravel laravel_crud
```

#
#### part 2

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

#
#### part 3
```
//.env export SERVER_PORT="8080"
php artisan serve --port=8080
```
routes/web.php
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
SiswaController.php
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

```
Copyright 2021 M. Fadli Zein
```