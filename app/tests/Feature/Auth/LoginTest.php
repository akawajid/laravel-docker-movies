<?php

use App\Models\User;

it('has login page', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

it('user can authenticate', function(string $email, string $password){

    $user = User::factory()->create([
        'email' => $email,
        'password' => bcrypt($password)
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', false));
})->with('users');