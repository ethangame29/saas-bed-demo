<?php

use App\Models\User;

it('Create a new user', function () {
    $attributes = User::factory()->raw();
    $response = $this->post('/api/v1/users', $attributes);
    $response->assertStatus(201)
        ->assertJsonStructure(
            ['id','name', 'email', 'updated_at', 'created_at'],
        );
    $this->assertDatabaseHas('users', $attributes);
});

it('Show All users', function () {
    $response = $this->get('/api/v1/users');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        '*' => [
            'name',
            'email'
        ],
    ]);
});

it('Show a user', function () {
    $response = $this->get('/api/v1/users/1');
    $response->assertStatus(200);
    $response->assertJsonStructure(
        ['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at']
    );
});

it('Update a users details', function () {
    $attributes = User::factory()->raw();

    $response = $this->putJson('/api/v1/users/1', $attributes);
    $response->assertStatus(201)
        ->assertJsonStructure(
            ['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at']
        );
    $this->assertDatabaseHas('users', $attributes);
});

it('Delete a user', function () {

});
