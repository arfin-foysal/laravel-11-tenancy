<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenancyRegisterController;
use Illuminate\Support\Facades\Route;

// Dynamically retrieve the central domain
$centralDomains = config('tenancy.central_domains');

foreach ($centralDomains as $key => $domain) {
    // Apply the domain to the route group
    Route::domain($domain)->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::get('tenancy-register', [TenancyRegisterController::class, 'create'])->name('tenancy.register.create');
        Route::post('tenancy-register', [TenancyRegisterController::class, 'store'])->name('tenancy.register.store');
        // Include auth routes
        require __DIR__.'/auth.php';
    });
}
