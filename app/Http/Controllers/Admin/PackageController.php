<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required|numeric'
        ]);

        Package::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'is_popular' => $request->has('is_popular'),
            'is_active' => true
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success','Package added successfully');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required|numeric'
        ]);

        $package->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success','Package updated');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->back()
            ->with('success','Package deleted');
    }
}
