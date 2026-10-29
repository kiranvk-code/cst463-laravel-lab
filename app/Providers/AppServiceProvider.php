<?php

namespace App\Providers;

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Lesson 4: EXPLICIT route model binding.
        // (Laravel 10 and older put this in RouteServiceProvider; from Laravel 11 it lives here.)
        Route::bind('roll', function (string $value) {
            return Student::where('roll_no', $value)->firstOrFail();
        });

        // Lesson 5: share data with ALL views
        View::share('courseName', 'CST463 Web Programming');
    }
}
