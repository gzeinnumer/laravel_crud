# laravel_crud
 Simple Laravel

#### part 1
```
composer create-project laravel/laravel laravel_crud
```

#### part 2

* laravel_crud\app\Providers

```php
class AppServiceProvider extends ServiceProvider
{

    ...

    public function boot()
    {
        Schema::defaultStringLength(255);
    }
}
```