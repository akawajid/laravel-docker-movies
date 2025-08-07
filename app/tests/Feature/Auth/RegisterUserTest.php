<?php

use App\Models\User;

it('register new user', function(string $name, string $email, string $password){
    $response = $this->post('/register', [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'password_confirmation' => $password,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', false));

})->with('registerUsers');