# laravel_crud
 Simple Laravel

#### PART 8
* laravel_crud\resources\views\siswa\index.blade.php
```html
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