<?php

namespace App\Http\Controllers;

use App\Models\TrademarkApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        if ($user->role === 'admin') {
            return view('admin.profile', compact('user'));
        }

        return view('user.profile', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:5120'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Name
        |--------------------------------------------------------------------------
        */

        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        /*
        |--------------------------------------------------------------------------
        | First / Last Name
        |--------------------------------------------------------------------------
        */

        if ($request->has('first_name')) {
            $user->first_name = $request->first_name;
        }

        if ($request->has('last_name')) {
            $user->last_name = $request->last_name;
        }

        /*
        |--------------------------------------------------------------------------
        | Email
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('email') &&
            $request->email !== $user->email
        ) {
            $user->email = $request->email;
            $user->email_verified_at = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Avatar
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('avatar')) {
            if (
                $user->avatar &&
                Storage::disk('public')->exists($user->avatar)
            ) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = $request
                ->file('avatar')
                ->store('avatars', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Password
        |--------------------------------------------------------------------------
        */

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        /*
        |--------------------------------------------------------------------------
        | Sync normal user's name data with applications
        |--------------------------------------------------------------------------
        */

        if ($user->role !== 'admin') {
            TrademarkApplication::where('user_id', $user->id)
                ->update([
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Redirect based on role
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'admin') {
            return redirect()
                ->route('admin.profile.edit')
                ->with('success', 'Admin profile updated successfully');
        }

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
