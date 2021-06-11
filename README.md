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

```
Copyright 2021 M. Fadli Zein
```