@extends('layouts.app')
@section('title', 'Payment status | Trademark USP')
@section('content')
<section style="padding:60px 24px"><h1>{{ $confirmed ? 'Payment confirmed' : 'Payment confirmation pending' }}</h1>
<p>{{ $confirmed ? 'Your payment has been received. You can review your application in your dashboard.' : 'We are waiting for verified payment confirmation. Please check your dashboard shortly. Do not pay again while confirmation is pending.' }}</p>
<a href="{{ route('dashboard') }}">Go to Dashboard</a></section>
@endsection
