# laravel_crud
 Simple Laravel

---
### [PART 13](https://github.com/gzeinnumer/laravel_crud/tree/part_13)
---

#### PART 14
* laravel_crud\resources\views\siswa\index.blade.php
```php
<tbody>
    @foreach($data_siswa as $d)
    <tr>
        <td><a href="/siswa/{{$siswa->id}}/profile">{{$d->nama_depan}}</a></td>
        <td><a href="/siswa/{{$siswa->id}}/profile">{{$d->nama_belakang}}</a></td>
        ...
    </tr>
    @endforeach
</tbody>
@endsection
```
* laravel_crud\routes\web.php
```php
Route::group(['middleware' => 'auth'], function(){
    Route::prefix('siswa')->group(function () {
        ...
        Route::get('{id}/profile', [SiswaController::class, 'profile']);
    });
});
```

* laravel_crud\app\Http\Controllers\SiswaController.php
```php
class SiswaController extends Controller
{
    ...

    public function profile($id)
    {
        $siswa = SiswaModel::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }
}
```
* laravel_crud\resources\views\siswa\profile.blade.php
```php
@extends('layout.master')

@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar" width="100">
                                <h3 class="name">{{$siswa->nama_depan." ".$siswa->nama_belakang}}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        45 <span>Projects</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        15 <span>Awards</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Data Diri</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
                                    <li>Agama <span>{{$siswa->agama}}</span></li>
                                    <li>Alamat <span>{{$siswa->alamat}}</span></li>
                                </ul>
                            </div>
                            <div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <div class="custom-tabs-line tabs-line-bottom left-aligned">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Aktivitas Terakhir</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-bottom-left1">
                                <ul class="list-unstyled activity-timeline">
                                    <li>
                                        <i class="fa fa-comment activity-icon"></i>
                                        <p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-cloud-upload activity-icon"></i>
                                        <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-plus activity-icon"></i>
                                        <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check activity-icon"></i>
                                        <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
                                    </li>
                                </ul>
                                <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
                            </div>
                        </div>
                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@endsection
```

* laravel_crud\resources\views\siswa\profile.blade.php
```php
...
<form action="/siswa/{{$data_siswa->id}}/update" method="POST" enctype="multipart/form-data">
    ...
    <div class="form-group">
        <label for="alamat" class="form-label">Avatar</label>
        <input type="file" name="avatar" class="form-control">
    </div>
</form>
```

* laravel_crud\app\Http\Models\SiswaModel.php
```php
class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->avatar);
    }
}
```

* laravel_crud\app\Http\Controllers\SiswaController.php
```php
class SiswaController extends Controller
{
    ...

    public function update(Request $r, $id)
    {
        $data_siswa = SiswaModel::find($id);
        $data_siswa->update($r->all());
        if ($r->hasFile('avatar')) {
            $r->file('avatar')->move('images/', $r->file('avatar')->getClientOriginalName());
            $data_siswa->avatar = $r->file('avatar')->getClientOriginalName();
            $data_siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
    }
}
```

---
### [PART 15](https://github.com/gzeinnumer/laravel_crud/tree/part_15)
---

```
Copyright 2021 M. Fadli Zein
```