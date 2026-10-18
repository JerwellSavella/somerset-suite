<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SecurityController extends Controller
{
    public function edit(): View
    {
        return view('security.edit');
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        DB::table('tbl_publisher_info')
            ->where('id', $request->user()->id)
            ->update([
                'password' => Hash::make($validated['password']),
                'default_password' => 0,
            ]);

        return back()->with('status', 'Password updated successfully.');
    }
}
