<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,

])->group(function () {
    Route::get('/dashboard', function () {

        return response()->json([
            'message' => 'This is your multi-tenant application. The id of the current tenant is '.tenant('id'),
            'user' => User::all(),
        ]);
    });

    // Add other tenant-specific API routes here
});
