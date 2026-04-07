<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view('user.profile', [
        //     'user' => $request->user(),
        // ]);

        $user = $request->user();

        if ($user->role === 'admin') {
            return view('admin.profile', compact('user'));
        }

        return view('user.profile', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // public function update(ProfileUpdateRequest $request)
    // {
    //     $user = $request->user();

    //     // First / Last Name
    //     $user->first_name = $request->first_name;
    //     $user->last_name  = $request->last_name;

    //     // Avatar Upload
    //     if ($request->hasFile('avatar')) {
    //         // Delete old avatar if exists
    //         if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
    //             Storage::disk('public')->delete($user->avatar);
    //         }

    //         $user->avatar = $request->file('avatar')->store('avatars', 'public');
    //     }

    //     // Password update
    //     if ($request->filled('password')) {
    //         $user->password = Hash::make($request->password);
    //     }

    //     $user->save();

    //     // Sync first_name & last_name to all user's trademark applications
    //     \App\Models\TrademarkApplication::where('user_id', $user->id)
    //         ->update([
    //             'first_name' => $user->first_name,
    //             'last_name'  => $user->last_name,
    //         ]);

    //     return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    // }

    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;

        // Avatar
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // Password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Only for NORMAL USERS
        if ($user->role !== 'admin') {
            \App\Models\TrademarkApplication::where('user_id', $user->id)
                ->update([
                    'first_name' => $user->first_name,
                    'last_name'  => $user->last_name,
                ]);
        }

        // 🔁 Redirect based on role
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
