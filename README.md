# laravel_crud
 Simple Laravel

---
### [PART 9](https://github.com/gzeinnumer/laravel_crud/tree/part_9)
---

#### PART 10
* laravel_crud\routes\web.php
```php
Route::prefix('siswa')->group(function () {
    ...
    Route::post('{id}/detele', [SiswaController::class, 'delete']);
});
```
* laravel_crud\resources\views\siswa\index.blade.php
```php
<table class="table table-hover">
    <tr>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    @foreach($data_siswa as $d)
        <tr>
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
### [PART 11](https://github.com/gzeinnumer/laravel_crud/tree/part_1)
---


---

```
Copyright 2021 M. Fadli Zein
```