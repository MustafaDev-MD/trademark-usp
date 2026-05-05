@extends('layouts.dashboard')

@section('title', 'Client Applications')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mb-3 p-3 rounded shadow-sm" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close m-0" aria-label="Close"></button>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(alert => {
        const closeBtn = alert.querySelector('.btn-close');
        if (!closeBtn) return;
        closeBtn.addEventListener('click', () => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = 0;
            setTimeout(() => alert.remove(), 500);
        });
    });
});
</script>

<h4 class="mb-3">Client Form Applications</h4>

<div class="table-scroll-wrapper" style="overflow:auto;">
    <table class="table datanew table-bordered table-striped table-hover">
        <thead class="sticky-top bg-white">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Owner of Mark</th>
                <th>Business Name</th>
                <th>Trademark Type</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Submitted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $app)
            <tr>
                <td>{{ $app->id }}</td>
                <td>{{ $app->first_name }} {{ $app->last_name }}</td>
                <td>{{ $app->email_address }}</td>
                <td>{{ $app->phone_number }}</td>
                <td>{{ $app->owner_of_mark }}</td>
                <td>{{ $app->business_name ?? '-' }}</td>
                <td>{{ $app->trademark_type }}</td>
                <td>{{ $app->city }}</td>
                <td>{{ $app->state }}</td>
                <td>{{ $app->country }}</td>
                <td>{{ $app->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('admin.client.applications.show', $app->id) }}" class="btn btn-sm btn-secondary">
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center">No applications found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('.datanew')) {
            $('.datanew').DataTable({
                paging: true, ordering: true, info: true, searching: true,
                lengthMenu: [10, 25, 50, 100], pageLength: 10,
                language: { search: "_INPUT_", searchPlaceholder: "Search applications..." }
            });
        }
    });
</script>

@endsection