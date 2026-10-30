@extends('layouts.dashboard')

@section('title', 'Popup Form Data')

@section('content')

<!--<div class="container">-->
    <h2 class="mb-4">Trademark Leads</h2>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th><th>Trademark details</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->phone }}</td>
                            <td>{{ $lead->message ?? '-' }}</td>
<td>@if($lead->trademark_types){{ implode(', ', $lead->trademark_types) }}@endif
@if($lead->trademark_name)<div>Name: {{ $lead->trademark_name }}</div>@endif
@if($lead->trademark_slogan)<div>Slogan: {{ $lead->trademark_slogan }}</div>@endif
@if($lead->logo_path)<a href="{{ route('admin.leads.logo', $lead) }}">Download logo</a>@endif</td>
                            <!--<td>{{ $lead->created_at->format('d M Y') }}</td>-->
                            <td>{{ $lead->created_at->timezone('Asia/Karachi')->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No leads found ❌
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
<!--</div>-->

@endsection

