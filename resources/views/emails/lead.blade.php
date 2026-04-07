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

    @if($lead->message)
        <p><strong>Message:</strong><br>{{ $lead->message }}</p>
    @endif
</body>
</html>
