<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrademarkApplication;
use Illuminate\Support\Facades\Auth;

class UserApplicationController extends Controller
{
    /**
     * Display logged-in user's applications
     */
    public function index()
{
    $applications = TrademarkApplication::where('user_id', Auth::id())
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(10);

    return view('user.dashboard', compact('applications'));
}

    /**
     * Show single application (optional)
     */
    
public function show($id)
{
    $application = TrademarkApplication::where('user_id', Auth::id())
                                        ->findOrFail($id);

    return view('user.application-detail', compact('application'));
}
}
