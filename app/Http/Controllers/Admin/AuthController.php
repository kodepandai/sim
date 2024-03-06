<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->merge([
            'role' => UserRole::ADMIN->value,
        ]);
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin:dashboard'));
    }
}
