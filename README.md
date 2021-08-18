# laravel_crud
 Simple Laravel

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

```
Copyright 2021 M. Fadli Zein
```