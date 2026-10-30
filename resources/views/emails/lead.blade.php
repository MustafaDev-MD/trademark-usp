<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Lead</title>
</head>
<body>
    <h2>New Trademark Lead</h2>

    <p><strong>Name:</strong> {{ $lead->name }}</p>
    <p><strong>Email:</strong> {{ $lead->email }}</p>
    <p><strong>Phone:</strong> {{ $lead->phone }}</p>

    @if($lead->selected_plan)<p><strong>Package:</strong> {{ ucfirst($lead->selected_plan) }}</p>@endif
    @if($lead->trademark_types)<p><strong>Trademark types:</strong> {{ implode(', ', array_map('ucfirst', $lead->trademark_types)) }}</p>@endif
    @if($lead->trademark_name)<p><strong>Trademark name:</strong> {{ $lead->trademark_name }}</p>@endif
    @if($lead->trademark_slogan)<p><strong>Slogan:</strong> {{ $lead->trademark_slogan }}</p>@endif
    @if($lead->logo_path)<p>The uploaded logo is attached to this email.</p>@endif
    @if($lead->message)
        <p><strong>Message:</strong><br>{{ $lead->message }}</p>
    @endif
</body>
</html>
