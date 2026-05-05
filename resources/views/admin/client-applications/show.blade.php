@extends('layouts.dashboard')

@section('title', 'Client Application Detail')

@section('content')

<h4 class="mb-4">Client Application #{{ $app->id }}</h4>

<div class="row">

    {{-- Personal Info --}}
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4">👤 Personal Information</h5>
            <div class="row g-3">
                <div class="col-6"><strong>First Name:</strong> {{ $app->first_name }}</div>
                <div class="col-6"><strong>Last Name:</strong> {{ $app->last_name }}</div>
                <div class="col-6"><strong>Email:</strong> {{ $app->email_address }}</div>
                <div class="col-6"><strong>Phone:</strong> {{ $app->phone_number }}</div>
                <div class="col-6"><strong>Website:</strong> 
                    @if($app->website)
                        <a href="{{ $app->website }}" target="_blank">{{ $app->website }}</a>
                    @else
                        -
                    @endif
                </div>
                <div class="col-6"><strong>Owner of Mark:</strong> {{ $app->owner_of_mark }}</div>
                <div class="col-6"><strong>DBA:</strong> {{ $app->dba ?? '-' }}</div>
                <div class="col-6"><strong>Business Name:</strong> {{ $app->business_name ?? '-' }}</div>
                <div class="col-6"><strong>Business Nature:</strong> {{ $app->business_nature }}</div>
            </div>
        </div>
    </div>

    {{-- Address Info --}}
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4">📍 Address</h5>
            <div class="row g-3">
                <div class="col-12"><strong>Mailing Address:</strong> {{ $app->mailing_address }}</div>
                <div class="col-6"><strong>City:</strong> {{ $app->city }}</div>
                <div class="col-6"><strong>State:</strong> {{ $app->state }}</div>
                <div class="col-6"><strong>Country:</strong> {{ $app->country }}</div>
                <div class="col-6"><strong>Zip Code:</strong> {{ $app->zip_code }}</div>
            </div>
        </div>
    </div>

    {{-- Trademark Info --}}
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4">™️ Trademark Details</h5>
            <div class="row g-3">
                <div class="col-6"><strong>Trademark Type:</strong> {{ $app->trademark_type }}</div>
                <div class="col-6"><strong>Mark Details:</strong> {{ $app->mark_details ?? '-' }}</div>
                <div class="col-6"><strong>Using Logo:</strong> {{ $app->using_logo }}</div>
                <div class="col-6"><strong>Usage List:</strong> {{ $app->usage_list ?? '-' }}</div>
                <div class="col-6"><strong>Date of Use:</strong> {{ $app->date_of_use ?? '-' }}</div>
                <div class="col-12">
                    <strong>Business Description:</strong>
                    <p class="mt-1">{{ $app->business_description }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Logo File --}}
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4">🖼️ Logo File</h5>
            @if($app->logo_file)
                @php $ext = pathinfo($app->logo_file, PATHINFO_EXTENSION); @endphp
                @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif','webp','svg']))
                    <img src="{{ asset('storage/' . $app->logo_file) }}" alt="Logo" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                    <div class="mt-2">
                        <a href="{{ asset('storage/' . $app->logo_file) }}" download class="btn btn-sm btn-outline-primary">⬇ Download</a>
                    </div>
                @else
                    <a href="{{ asset('storage/' . $app->logo_file) }}" download class="btn btn-sm btn-outline-primary">⬇ Download File</a>
                @endif
            @else
                <p class="text-muted">No logo uploaded.</p>
            @endif
            <div class="mt-3 text-muted" style="font-size:13px;">
                Submitted: {{ $app->created_at->format('M d, Y h:i A') }}
            </div>
        </div>
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('admin.client.applications.index') }}" class="btn btn-secondary">← Back to Applications</a>
</div>

@endsection