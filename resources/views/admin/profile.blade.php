@extends('layouts.dashboard')

@section('title', 'Admin Profile')

@section('content')

<!--{{-- TOP ALERTS --}}-->
<!--@if(session('success'))-->
<!--<div id="success-alert" class="alert alert-success mb-3">-->
<!--    {{ session('success') }}-->
<!--</div>-->
<!--<script>-->
<!--    setTimeout(() => {-->
<!--        const alert = document.getElementById('success-alert');-->
<!--        if (alert) alert.style.display = 'none';-->
<!--    }, 5000);-->
<!--</script>-->
<!--@endif-->

<!--@if(session('error'))-->
<!--<div id="error-alert" class="alert alert-danger mb-3">-->
<!--    {{ session('error') }}-->
<!--</div>-->
<!--<script>-->
<!--    setTimeout(() => {-->
<!--        const alert = document.getElementById('error-alert');-->
<!--        if (alert) alert.style.display = 'none';-->
<!--    }, 5000);-->
<!--</script>-->
<!--@endif-->

{{-- TOP ALERTS --}}
@if(session('success'))
<div id="success-alert" 
     class="alert alert-success alert-dismissible fade show mb-3 p-3 rounded shadow-sm" 
     role="alert">
    {{ session('success') }}
    <!-- Close button -->
    <button type="button" class="btn-close m-0" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div id="error-alert" 
     class="alert alert-danger alert-dismissible fade show mb-3 p-3 rounded shadow-sm" 
     role="alert">
    {{ session('error') }}
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


<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" autocomplete="on">
    @csrf
    @method('PATCH')

    <div class="page-header">
        <div class="page-title">
            <h4>Profile</h4>
            <h6>Admin Profile</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="profile-set">
                <div class="profile-head"></div>

                <div class="profile-top">
                    <div class="profile-content">

                        {{-- AVATAR --}}
                        <div class="profile-contentimg">
                            <img src="{{ $user->avatar_url }}" alt="Admin Avatar" id="blah">
                            <div class="profileupload">
                                <label for="imgInp" class="sr-only">Upload Avatar</label>
                                <input type="file" name="avatar" id="imgInp" accept="image/*">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/img/icons/edit-set.svg') }}" alt="Edit Avatar">
                                </a>
                            </div>
                        </div>

                        {{-- USERNAME --}}
                        <div class="profile-contentname">
                            <h2>{{ $user->name }}</h2>
                            <h4>Update your photo and personal details</h4>
                        </div>

                    </div>

                    <div class="ms-auto d-flex">
                        <!--<button type="submit" class="btn btn-submit me-2 m-0">Save</button>-->
                        <button type="submit" class="main-nav-button me-2 m-0">Save</button>
                        <!--<a href="{{ route('dashboard') }}" class="btn btn-cancel">Cancel</a>-->
                        <a href="{{ route('dashboard') }}" class="second-nav-button">Cancel</a>
                    </div>
                </div>
            </div>

            <div class="row">

                {{-- FIRST NAME --}}
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control"
                               value="{{ old('first_name', $user->first_name) }}" autocomplete="given-name">
                    </div>
                </div>

                {{-- LAST NAME --}}
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control"
                               value="{{ old('last_name', $user->last_name) }}" autocomplete="family-name">
                    </div>
                </div>

                {{-- EMAIL --}}
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                               value="{{ $user->email }}" readonly autocomplete="email">
                    </div>
                </div>

                {{-- USERNAME (READ ONLY) --}}
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" value="{{ $user->name }}" readonly>
                    </div>
                </div>

                <h4>Change Password</h4>

                <div class="form-group col-lg-6 col-sm-12">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
                </div>

                <div class="form-group col-lg-6 col-sm-12">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password">
                    <span id="password-error" class="d-block mt-1 text-danger d-none"></span>
                </div>

                <div class="col-12 d-flex">
                    <!--<button type="submit" class="btn btn-submit me-2 m-0">Submit</button>-->
                    <button type="submit" class="main-nav-button me-2 m-0">Submit</button>
                    <a href="{{ route('dashboard') }}" class="second-nav-button">Cancel</a>
                    <!--<a href="{{ route('dashboard') }}" class="btn btn-cancel">Cancel</a>-->
                </div>

            </div>

        </div>
    </div>
</form>

{{-- AVATAR LIVE PREVIEW --}}
<script>
document.getElementById('imgInp').addEventListener('change', function(e) {
    const [file] = e.target.files;
    if (file) {
        document.getElementById('blah').src = URL.createObjectURL(file);
    }
});

const password = document.getElementById('password');
const confirmPassword = document.getElementById('password_confirmation');
const errorText = document.getElementById('password-error');
const submitButtons = document.querySelectorAll('button[type="submit"]');

function validatePasswords() {
    if (!password.value && !confirmPassword.value) {
        errorText.classList.add('d-none');
        password.classList.remove('is-invalid', 'is-valid');
        confirmPassword.classList.remove('is-invalid', 'is-valid');
        submitButtons.forEach(btn => btn.disabled = false);
        return;
    }
    if (password.value !== confirmPassword.value) {
        errorText.classList.remove('d-none');
        errorText.innerText = "Passwords do not match";
        errorText.classList.add('text-danger');
        errorText.classList.remove('text-success');
        password.classList.add('is-invalid');
        confirmPassword.classList.add('is-invalid');
        password.classList.remove('is-valid');
        confirmPassword.classList.remove('is-valid');
        submitButtons.forEach(btn => btn.disabled = true);
    } else {
        errorText.classList.remove('d-none');
        errorText.innerText = "Passwords match";
        errorText.classList.remove('text-danger');
        errorText.classList.add('text-success');
        password.classList.remove('is-invalid');
        confirmPassword.classList.remove('is-invalid');
        password.classList.add('is-valid');
        confirmPassword.classList.add('is-valid');
        submitButtons.forEach(btn => btn.disabled = false);
    }
}

password.addEventListener('keyup', validatePasswords);
confirmPassword.addEventListener('keyup', validatePasswords);
</script>

@endsection
