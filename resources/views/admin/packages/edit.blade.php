@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title">Edit Package</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.packages.update',$package->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- LEFT --}}
                        <div class="col-md-6">
                            <h5 class="card-title">Package Details</h5>

                            <div class="form-group mb-3">
                                <label>Package Name</label>
                                <input type="text"
                                       name="name"
                                       value="{{ old('name',$package->name) }}"
                                       class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Package Type</label>
                                <select name="type" class="form-control">
                                    <option value="registration" @selected($package->type=='registration')>Registration</option>
                                    <option value="search" @selected($package->type=='search')>Search</option>
                                    <option value="processing" @selected($package->type=='processing')>Processing</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Price ($)</label>
                                <input type="number"
                                       step="0.01"
                                       name="price"
                                       value="{{ $package->price }}"
                                       class="form-control">
                            </div>
                        </div>

                        {{-- RIGHT --}}
                        <div class="col-md-6">
                            <h5 class="card-title">Settings</h5>

                            <div class="form-group mb-3">
                                <label>
                                    <input type="checkbox" name="is_popular" @checked($package->is_popular)>
                                    Mark as Popular
                                </label>
                            </div>

                            <div class="form-group mb-3">
                                <label>
                                    <input type="checkbox" name="is_active" @checked($package->is_active)>
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            Update Package
                        </button>
                        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection