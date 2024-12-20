<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class TenancyRegisterController extends Controller
{
    public function create()
    {
        return view('tenancy-register');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'domain' => 'required|string|max:255|unique:domains,domain',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Create a new tenant
        $tenant = Tenant::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);
    
        // Add the domain
        $tenant->domains()->create([
            'domain' => $validatedData['domain'] . '.' . config('tenancy.central_domains')[1],
        ]);
    
        // Create the tenant admin user
        $tenant->run(function () use ($validatedData) {
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);
        });
    
        // Redirect to the tenant's domain
        return redirect()->to('http://' . $tenant->domains->first()->domain);
    }
         
}
