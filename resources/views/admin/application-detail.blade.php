@extends('layouts.dashboard')

@section('title', 'Application Detail - Admin')

@section('content')

<!--@if(request('status') === 'success' || request('status') === 'cancel')-->
<!--<div id="payment-alert" class="alert {{ request('status') === 'success' ? 'alert-success' : 'alert-warning' }}">-->
<!--    @if(request('status') === 'success')-->
<!--    🎉 Payment completed successfully!-->
<!--    @else-->
<!--    ⚠️ Payment is not complete. Complete Your Payment-->
<!--    @endif-->
<!--</div>-->
<!--@endif-->

@if(request('status') === 'success' || request('status') === 'cancel')
<div id="payment-alert" 
     class="alert {{ request('status') === 'success' ? 'alert-success' : 'alert-warning' }} alert-dismissible fade show mb-3 p-3 rounded shadow-sm" 
     role="alert">
     
    @if(request('status') === 'success')
        🎉 Payment completed successfully!
    @else
        ⚠️ Payment is not complete. Complete your payment.
    @endif

    <!-- Close button -->
    <button type="button" class="btn-close m-0" data-bs-dismiss="alert" aria-label="Close"></button>
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

<div class="row">
    <!-- Application Details -->
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4 d-flex align-items-center">
                <span class="me-2">📄</span> Application Details
            </h5>

            <!-- STATUS BADGES -->
            <div class="mb-3 d-flex flex-wrap gap-2">
                <div class="badge bg-light border p-2 text-dark" style="font-size:16px;">
                    <strong>ID:</strong> #{{ $application->id }}
                </div>
                <div class="badge {{ match($application->payment_status) {
                            'paid' => 'bg-lightgreen text-dark',
                            'partial' => 'bg-lightyellow text-dark',
                            default => 'bg-lightred text-dark',
                        } }} p-2" style="font-size:16px;">
                    <strong>Payment:</strong> {{ ucfirst($application->payment_status) }}
                </div>
                <div class="badge {{ match($application->project_status) {
                            'completed' => 'bg-success text-white',
                            'in_progress' => 'bg-primary text-white',
                            'on_hold' => 'bg-warning text-dark',
                            default => 'bg-secondary text-white',
                        } }} p-2" style="font-size:16px;">
                    <strong>Project:</strong> {{ ucfirst(str_replace('_',' ', $application->project_status)) }}
                </div>
            </div>


            <!-- UPDATE STATUS -->
            <div class="mb-4">
                <form action="{{ route('admin.application.update-status', $application->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label class="form-label fw-bold">Update Project Status:</label>
                    <select name="project_status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="in_progress" {{ $application->project_status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $application->project_status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="on_hold" {{ $application->project_status === 'on_hold' ? 'selected' : '' }}>On Hold</option>
                    </select>
                </form>
            </div>

            <!-- USER DETAILS GRID -->
            <div class="row g-3">
                <div class="col-6"><strong>Trademark Type:</strong> {{ $application->trademark_type }}</div>
                <div class="col-6"><strong>Trademark Text:</strong> {{ $application->trademark_text ?? '-' }}</div>
                <div class="col-6"><strong>Logo Name:</strong> {{ $application->logo_name ?? '-' }}</div>
                <div class="col-6"><strong>Logo Description:</strong> {{ $application->logo_description ?? '-' }}</div>
                <!--<div class="col-6"><strong>First Name:</strong> {{ $application->first_name }}</div>-->
                <!--<div class="col-6"><strong>Last Name:</strong> {{ $application->last_name }}</div>-->
                <div class="col-6"><strong>Email:</strong> {{ $application->email }}</div>
                <div class="col-6"><strong>Phone:</strong> {{ $application->phone }}</div>
                <div class="col-6"><strong>SMS Consent:</strong> {{ $application->sms_consent ? 'Yes' : 'No' }}</div>
                <div class="col-6"><strong>Plan:</strong> {{ ucfirst($application->plan) }}</div>
                <div class="col-6"><strong>Addons:</strong> {{ implode(', ', $application->addons ?? []) }}</div>
                <div class="col-6"><strong>Priority:</strong> {{ ucfirst($application->priority) }}</div>
                <div class="col-6"><strong>Promo Code:</strong> {{ $application->promo_code ?? '-' }}</div>
            </div>
        </div>
    </div>


    <!-- Price Breakdown & Payment -->
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm p-3 h-100">
            <h5 class="mb-3">💰 Price Breakdown</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">Plan Price: <span>${{ number_format($planPrice, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between">Addons Price: <span>${{ number_format($addonsPrice, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between">Priority Price: <span>${{ number_format($priorityPrice, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between">Subtotal: <span>${{ number_format($subtotal, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between">Discount: <span>-${{ number_format($discount, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between fw-bold">Total: <span>${{ number_format($total, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between">Paid: <span>${{ number_format($paid, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between">Remaining: <span>${{ number_format($remaining, 2) }}</span></li>
            </ul>

            <!-- <div class="mt-3">
                @if($application->payment_status !== 'paid')
                <a href="{{ route('user.payment.pay', $application->id) }}" class="main-nav-button primary-cta">
                    💳 Pay ${{ number_format($remaining, 2) }}
                </a>
                @else
                <span class="badges bg-lightgreen">Payment Completed</span>
                @endif
            </div> -->
        </div>
    </div>
</div>

<!-- ACTION -->
<div class="mt-3">
    <a href="{{ route('admin.user.applications', $application->user_id) }}" class="btn btn-secondary">
        ← Back to Applications
    </a>
</div>

<script>
//     document.addEventListener('DOMContentLoaded', function() {
//         const alert = document.getElementById('payment-alert');
//         if (alert) {
//             setTimeout(() => {
//                 alert.style.transition = "opacity 0.5s";
//                 alert.style.opacity = 0;
//                 setTimeout(() => alert.remove(), 500);
//             }, 5000);
//         }
//     });
document.addEventListener('DOMContentLoaded', function() {
    const paymentAlert = document.getElementById('payment-alert');
    if (!paymentAlert) return;

    const closeButton = paymentAlert.querySelector('.btn-close');
    if (!closeButton) return;

    closeButton.addEventListener('click', function() {
        // Smooth fade out
        paymentAlert.style.transition = 'opacity 0.5s ease';
        paymentAlert.style.opacity = 0;

        // Remove from DOM after fade
        setTimeout(() => {
            paymentAlert.remove();
        }, 500);
    });
});
</script>

@endsection