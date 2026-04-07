@extends('layouts.dashboard')

@section('title', 'Checkout Payment')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Checkout Payment for Application #{{ $application->id }}</h3>

        <p><strong>Trademark:</strong> {{ $application->trademark_text ?? '-' }}</p>
        <p><strong>Total Amount:</strong> ${{ number_format($application->total, 2) }}</p>
        <p><strong>Paid:</strong> ${{ number_format($application->paid_amount ?? 0, 2) }}</p>
        <p><strong>Remaining:</strong> ${{ number_format($application->total - ($application->paid_amount ?? 0), 2) }}</p>

        <a href="{{ route('user.payment.pay', $application->id) }}" class="btn btn-success mt-3">
            💳 Pay Now ${{ number_format($application->total - ($application->paid_amount ?? 0), 2) }}
        </a>

        <a href="{{ route('user.applications.show', $application->id) }}" class="btn btn-secondary mt-3">
            ← Back to Application
        </a>
    </div>
</div>
@endsection
