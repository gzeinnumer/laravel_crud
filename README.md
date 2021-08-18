# laravel_crud
 Simple Laravel

---
### [PART 6](https://github.com/gzeinnumer/laravel_crud/tree/part_6)
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
### [PART 8](https://github.com/gzeinnumer/laravel_crud/tree/part_8)
---

```
Copyright 2021 M. Fadli Zein
```