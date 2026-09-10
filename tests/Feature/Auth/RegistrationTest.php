<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertOk();
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '+12345678901',
        'dob' => '1995-01-01',
        'password' => 'password',
        'password_confirmation' => 'password',
        'terms' => true,
    ]);

    $response->assertRedirect(
        route('verify.code', absolute: false)
    );

    $this->assertAuthenticated();

    $this->assertDatabaseHas('users', [
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);
});
