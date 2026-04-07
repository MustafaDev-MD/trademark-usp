<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TrademarkApplication;

class AdminUserController extends Controller
{
    // Show all applications of a user
    public function showApplications($userId)
    {
        $user = User::with('applications')->findOrFail($userId);
        return view('admin.user-applications', compact('user'));
    }

    // Update project status of an application
    public function updateProjectStatus(Request $request, $appId)
    {
        $request->validate([
            'project_status' => 'required|in:completed,in_progress,on_hold',
        ]);

        $application = TrademarkApplication::findOrFail($appId);
        $application->project_status = $request->project_status;
        $application->save();

        return redirect()->back()->with('success', 'Project status updated successfully!');
    }
}
