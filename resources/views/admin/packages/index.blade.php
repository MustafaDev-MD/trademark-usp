@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Packages</h4>
            <h6>Manage all packages</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('admin.packages.create') }}" class="btn btn-added">
                <i class="fa fa-plus"></i> Add Package
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($packages as $key => $package)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $package->name }}</td>
                                <td>${{ $package->price ?? '0.00' }}</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.packages.edit', $package->id) }}"
                                       class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No packages found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection