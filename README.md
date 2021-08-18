# laravel_crud
 Simple Laravel

---
### [PART 10](https://github.com/gzeinnumer/laravel_crud/tree/part_10)
---

#### PART 11
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
### [PART 12](https://github.com/gzeinnumer/laravel_crud/tree/part_12)
---

```
Copyright 2021 M. Fadli Zein
```