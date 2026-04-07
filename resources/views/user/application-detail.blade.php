@extends('layouts.dashboard')

@section('title', 'Application Detail')

@section('content')

<!--@if(request('status') === 'success' || request('status') === 'cancel')-->
<!--<div id="payment-alert"-->
<!--     class="alert {{ request('status') === 'success' ? 'alert-success' : 'alert-warning' }} rounded shadow-sm p-3 mb-4"-->
<!--     style="position: relative;">-->
     
<!--    @if(request('status') === 'success')-->
<!--        🎉 Payment completed successfully!-->
<!--    @else-->
<!--        ⚠️ Payment is not complete. Complete Your Payment-->
<!--    @endif-->

    <!-- Close button -->
<!--    <button id="payment-alert-close" -->
<!--            style="position: absolute; top: 5px; right: 10px; background: transparent; border: none; font-size: 16px; cursor: pointer;">-->
<!--        &times;-->
<!--    </button>-->
<!--</div>-->
<!--@endif-->

@if(request('status') === 'success' || request('status') === 'cancel')
<div class="alert {{ request('status') === 'success' ? 'alert-success' : 'alert-warning' }} alert-dismissible fade show rounded shadow-sm mb-4 p-3" role="alert">
    
    @if(request('status') === 'success')
        🎉 Payment completed successfully!
    @else
        ⚠️ Payment is not complete. Complete your payment.
    @endif

    <!-- Bootstrap close button -->
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@php
$planPrice = $application->plan_price ?? 0;
$addonsPrice = $application->addons_price ?? 0;
$priorityPrice = $application->priority_price ?? 0;
$subtotal = $planPrice + $addonsPrice + $priorityPrice;
$discount = $application->discount ?? 0;
$total = $application->total ?? ($subtotal - $discount);
$paid = $application->paid_amount ?? 0;
$remaining = max($total - $paid, 0);
@endphp

<div class="row g-4">

    <!-- Status Card -->
    <div class="col-12 col-md-6">
        <div class="card shadow-sm p-3">
            <h5 class="mb-3">Application Status</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><strong>ID:</strong> <span>{{ $application->id }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>User ID:</strong> <span>{{ $application->user_id }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Status:</strong> <span>{{ ucfirst($application->status) }}</span></li>

                <!-- Payment Status Highlight -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Payment Status:</strong>
                    @php
                    $paymentClass = match($application->payment_status) {
                    'paid' => 'bg-lightgreen',
                    'partial' => 'bg-lightyellow',
                    default => 'bg-lightred',
                    };
                    @endphp
                    <span class="badges {{ $paymentClass }} py-1 px-3" style="font-size: 1.1rem;">
                        {{ ucfirst($application->payment_status) }}
                    </span>
                </li>

                <!-- Project Status Highlight -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Project Status:</strong>
                    @php
                    $projectClass = match($application->project_status) {
                    'completed' => 'bg-success',
                    'in_progress' => 'bg-primary',
                    'on_hold' => 'bg-warning',
                    default => 'bg-secondary',
                    };
                    @endphp
                    <span class="badges {{ $projectClass }} py-1 px-3" style="font-size: 1.1rem;">
                        {{ ucfirst(str_replace('_',' ', $application->project_status)) }}
                    </span>
                </li>
            </ul>

            <!-- Pay Button -->
            <!--<div class="mt-3 text-center">-->
            <!--    @if($application->payment_status !== 'paid')-->
            <!--    <a href="{{ route('user.payment.pay', $application->id) }}"-->
            <!--        class="btn btn-primary btn-lg w-100">-->
            <!--        💳 Pay ${{ number_format($remaining, 2) }}-->
            <!--    </a>-->
            <!--    @else-->
            <!--    <span class="badge bg-lightgreen py-2 px-3 w-100" style="font-size:1.1rem;">Payment Completed</span>-->
            <!--    @endif-->
            <!--</div>-->
        </div>
    </div>

    <!-- Price Breakdown & Payment Summary -->
    <div class="col-12 col-md-6">
        <div class="card shadow-sm p-4 rounded-4">
            <h5 class="mb-4 fw-bold">💰 Price Breakdown</h5>
            <ul class="list-group list-group-flush">

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-secondary">Plan Price:</span>
                    <span class="fw-semibold" style="font-size:1.05rem">${{ number_format($planPrice, 2) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-secondary">Addons Price:</span>
                    <span class="fw-semibold" style="font-size:1.05rem">${{ number_format($addonsPrice, 2) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-secondary">Priority Price:</span>
                    <span class="fw-semibold" style="font-size:1.05rem">${{ number_format($priorityPrice, 2) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-secondary">Subtotal:</span>
                    <span class="fw-semibold" style="font-size:1.05rem">${{ number_format($subtotal, 2) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-secondary">Discount:</span>
                    <span class="fw-semibold text-danger" style="font-size:1.05rem">-${{ number_format($discount, 2) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center bg-light rounded-2">
                    <span class="fw-bold">Total:</span>
                    <span class="fw-bold" style="font-size:1.1rem">${{ number_format($total, 2) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-secondary">Paid:</span>
                    <span class="fw-semibold" style="font-size:1.05rem">${{ number_format($paid, 2) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-secondary">Remaining:</span>
                    <span class="fw-semibold" style="font-size:1.05rem">${{ number_format($remaining, 2) }}</span>
                </li>

            </ul>
        </div>
    </div>

    <!-- Full Application Details -->
    <div class="col-12">
        <div class="card shadow-sm p-4 rounded-4">
            <h5 class="mb-4 fw-bold">📄 Application Details</h5>
            <div class="row g-3">

                <!-- Each field as a bordered block with spacing -->
                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Trademark Type:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->trademark_type }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Trademark Text:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->trademark_text ?? '-' }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Logo Name:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->logo_name ?? '-' }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Logo Description:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->logo_description ?? '-' }}</span>
                    </div>
                </div>

                <!--<div class="col-md-6">-->
                <!--    <div class="p-3 border rounded-3 bg-light">-->
                <!--        <strong class="text-secondary">First Name:</strong>-->
                <!--        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->first_name }}</span>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="col-md-6">-->
                <!--    <div class="p-3 border rounded-3 bg-light">-->
                <!--        <strong class="text-secondary">Last Name:</strong>-->
                <!--        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->last_name }}</span>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="col-md-6">-->
                <!--    <div class="p-3 border rounded-3 bg-light">-->
                <!--        <strong class="text-secondary">Email:</strong>-->
                <!--        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->email }}</span>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="col-md-6">-->
                <!--    <div class="p-3 border rounded-3 bg-light">-->
                <!--        <strong class="text-secondary">Phone:</strong>-->
                <!--        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->phone }}</span>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">SMS Consent:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->sms_consent ? 'Yes' : 'No' }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Plan:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ ucfirst($application->plan) }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Addons:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ implode(', ', $application->addons ?? []) }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Priority:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ ucfirst($application->priority) }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Promo Code:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">{{ $application->promo_code ?? '-' }}</span>
                    </div>
                </div>

                <!-- Prices -->
                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Total Amount:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">${{ number_format($application->total, 2) }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Plan Price:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">${{ number_format($planPrice, 2) }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Addons Price:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">${{ number_format($addonsPrice, 2) }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Priority Price:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">${{ number_format($priorityPrice, 2) }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <strong class="text-secondary">Subtotal:</strong>
                        <span class="fw-semibold ms-2" style="font-size:1.05rem">${{ number_format($subtotal, 2) }}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

<div class="mt-3">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Back to Applications</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const alert = document.getElementById('payment-alert');
    const closeBtn = document.getElementById('payment-alert-close');

    if (alert && closeBtn) {
        closeBtn.onclick = () => {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = 0;
            setTimeout(() => alert.remove(), 500);
        };
    }
});
</script>

@endsection