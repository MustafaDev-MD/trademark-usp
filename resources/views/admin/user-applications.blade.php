@extends('layouts.dashboard')

@section('title', 'Applications of ' . $user->name)

@section('content')

<!--@if(session('success'))-->
<!--<div class="alert alert-success">{{ session('success') }}</div>-->
<!--@endif-->

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mb-3 p-3 rounded shadow-sm" role="alert">
    {{ session('success') }}
    <!-- Close button -->
    <button type="button" class="btn-close m-0" aria-label="Close"></button>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all dismissible alerts
    const alerts = document.querySelectorAll('.alert-dismissible');

    alerts.forEach(alert => {
        const closeBtn = alert.querySelector('.btn-close');
        if (!closeBtn) return;

        closeBtn.addEventListener('click', () => {
            // Smooth fade out
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = 0;

            // Remove alert from DOM after fade
            setTimeout(() => alert.remove(), 500);
        });
    });
});
</script>

<h4 class="mb-3">Applications of {{ $user->name }}</h4>

<div class="table-scroll-wrapper" style="overflow:auto;">
    <table class="table datanew table-bordered table-striped table-hover">
        <thead class="sticky-top bg-white">
            <tr>
                <th>ID</th>
                <th>Trademark Type</th>
                <th>Trademark Text</th>
                <th>Logo Name</th>
                <th>Logo Description</th>
                <!--<th>First Name</th>-->
                <!--<th>Last Name</th>-->
                <!--<th>Email</th>-->
                <!--<th>Phone</th>-->
                <th>Plan</th>
                <th>Plan Price</th>
                <th>Addons</th>
                <th>Addons Price</th>
                <th>Priority</th>
                <th>Priority Price</th>
                <th>Subtotal</th>
                <th>Promo Code</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Payment Status</th>
                <th>Project Status</th>
                <!-- <th>Payment</th> -->
                <th>Update Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($user->applications as $app)
            @php
                $planPrice = $app->plan_price ?? 0;
                $addonsPrice = $app->addons_price ?? 0;
                $priorityPrice = $app->priority_price ?? 0;
                $subtotal = $planPrice + $addonsPrice + $priorityPrice;
                $discount = $app->discount ?? 0;
                $total = $app->total ?? ($subtotal - $discount);
                $paid = $app->paid_amount ?? 0;
                $remaining = max($total - $paid, 0);
            @endphp
            <tr>
                <td>{{ $app->id }}</td>
                <td>{{ ucfirst($app->trademark_type) }}</td>
                <td>{{ $app->trademark_text ?? '-' }}</td>
                <td>{{ $app->logo_name ?? '-' }}</td>
                <td>{{ $app->logo_description ?? '-' }}</td>
                <!--<td>{{ $app->first_name }}</td>-->
                <!--<td>{{ $app->last_name }}</td>-->
                <!--<td>{{ $app->email }}</td>-->
                <!--<td>{{ $app->phone }}</td>-->
                <td>{{ ucfirst($app->plan) }}</td>
                <td>${{ number_format($planPrice, 2) }}</td>
                <td>{{ is_array($app->addons) ? implode(', ', $app->addons) : '-' }}</td>
                <td>${{ number_format($addonsPrice, 2) }}</td>
                <td>{{ ucfirst($app->priority) }}</td>
                <td>${{ number_format($priorityPrice, 2) }}</td>
                <td>${{ number_format($subtotal, 2) }}</td>
                <td>{{ $app->promo_code ?? '-' }}</td>
                <td>${{ number_format($discount, 2) }}</td>
                <td>${{ number_format($total, 2) }}</td>

                {{-- Payment Status --}}
                <td>
                    @php
                    $paymentClass = match($app->payment_status) {
                        'paid' => 'bg-lightgreen',
                        'partial' => 'bg-lightyellow',
                        default => 'bg-lightred',
                    };
                    @endphp
                    <span class="badges {{ $paymentClass }}">
                        {{ ucfirst($app->payment_status) }}
                    </span>
                </td>

                {{-- Project Status --}}
                <td>
                    @php
                    $projectClass = match($app->project_status) {
                        'completed' => 'bg-success',
                        'in_progress' => 'bg-primary',
                        'on_hold' => 'bg-warning',
                        default => 'bg-secondary',
                    };
                    @endphp
                    <span class="badges {{ $projectClass }}">
                        {{ ucfirst(str_replace('_',' ', $app->project_status)) }}
                    </span>
                </td>

                {{-- Payment Button --}}
                <!-- <td>
                    @if($app->payment_status !== 'paid')
                    <a href="{{ route('user.payment.pay', $app->id) }}" class="main-nav-button primary-cta">
                        💳 Pay ${{ number_format($remaining, 2) }}
                    </a>
                    @else
                    <span class="badges bg-lightgreen">Payment Completed</span>
                    @endif
                </td> -->

                {{-- Update Project Status --}}
                <td>
                    <form action="{{ route('admin.application.update-status', $app->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="project_status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="in_progress" {{ $app->project_status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $app->project_status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="on_hold" {{ $app->project_status === 'on_hold' ? 'selected' : '' }}>On Hold</option>
                        </select>
                    </form>
                </td>

                {{-- Action --}}
                <td>
                    <a href="{{ route('admin.user.applications.show', [$user->id, $app->id]) }}" class="btn btn-sm btn-secondary">
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="24" class="text-center">No applications found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-2">← Back to Users</a>

<!-- jQuery + DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('.datanew')) {
            $('.datanew').DataTable({
                paging: true,
                ordering: true,
                info: true,
                searching: true,
                lengthMenu: [10, 25, 50, 100],
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search applications..."
                }
            });
        }
    });
</script>

@endsection
