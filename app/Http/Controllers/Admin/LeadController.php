<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::latest()->get(); // or paginate(20)

        return view('admin.leads.lead', compact('leads'));
    }
}
