<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TrademarkApplication;

class AdminApplicationController extends Controller
{
    /**
     * Show all users and their applications
     */
    public function index()
    {
        // Get all users except admins (optional)
        $users = User::where('role', '!=', 'admin')->orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('users'));
    }

    public function show(User $user, TrademarkApplication $application)
    {
        // safety check (application belongs to user)
        abort_if($application->user_id !== $user->id, 404);

        return view('admin.application-detail', [
            'application' => $application
        ]);
    }

    
}
