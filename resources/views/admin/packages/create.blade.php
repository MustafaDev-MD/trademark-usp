@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title">Add Package</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.packages.store') }}">
                    @csrf

                    <div class="row">
                        {{-- LEFT COLUMN --}}
                        <div class="col-md-6">
                            <h5 class="card-title">Package Details</h5>

                            <div class="form-group mb-3">
                                <label>Package Name</label>
                                <input type="text"
                                       name="name"
                                       value="{{ old('name') }}"
                                       class="form-control"
                                       placeholder="Basic / Standard / Premium">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Package Type</label>
                                <select name="type" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="registration">Registration</option>
                                    <option value="search">Search</option>
                                    <option value="processing">Processing</option>
                                </select>
                                @error('type') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Price ($)</label>
                                <input type="number"
                                       step="0.01"
                                       name="price"
                                       value="{{ old('price') }}"
                                       class="form-control">
                                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- RIGHT COLUMN --}}
                        <div class="col-md-6">
                            <h5 class="card-title">Settings</h5>

                            <div class="form-group mb-3">
                                <label>
                                    <input type="checkbox" name="is_popular">
                                    Mark as Popular
                                </label>
                            </div>

                            <div class="form-group mb-3">
                                <label>
                                    <input type="checkbox" name="is_active" checked>
                                    Active
                                </label>
                            </div>

                            <div class="alert alert-info">
                                <strong>Note:</strong><br>
                                - Popular package will be highlighted on frontend<br>
                                - Inactive packages will not show to users
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            Save Package
                        </button>
                        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
