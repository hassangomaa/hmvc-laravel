<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\User;

uses(Tests\TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('can list users', function () {
    User::factory()->count(5)->create();

    $this->getJson(route('api.users.index'))
        ->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'email', 'created_at', 'updated_at']
            ]
        ]);
});

it('can create a user', function () {
    $payload = [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'password' => 'password123',
    ];

    $this->postJson(route('api.users.store'), $payload)
        ->assertStatus(201)
        ->assertJsonStructure([
            'data' => ['id', 'name', 'email', 'created_at', 'updated_at']
        ]);

    $this->assertDatabaseHas('users', [
        'email' => $payload['email']
    ]);
});

it('cannot create user with existing email', function () {
    $existingUser = User::factory()->create();

    $payload = [
        'name' => 'Jane Doe',
        'email' => $existingUser->email, // Duplicate email
        'password' => 'password123',
    ];

    $this->postJson(route('api.users.store'), $payload)
        ->assertStatus(422)
        ->assertJsonValidationErrors(['email']);
});

it('can view a single user', function () {
    $user = User::factory()->create();

    $this->getJson(route('api.users.show', $user->id))
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
});

it('can update a user', function () {
    $user = User::factory()->create();

    $payload = [
        'name' => 'Updated Name',
        'email' => 'updated@example.com',
        'password' => 'newpassword123',
    ];

    $this->putJson(route('api.users.update', $user->id), $payload)
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                'name' => $payload['name'],
                'email' => $payload['email']
            ]
        ]);

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'email' => $payload['email']
    ]);
});

it('cannot update user with existing email', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $payload = [
        'name' => 'Updated Name',
        'email' => $user2->email, // Email already exists
    ];

    $this->putJson(route('api.users.update', $user1->id), $payload)
        ->assertStatus(422)
        ->assertJsonValidationErrors(['email']);
});

it('can delete a user', function () {
    $user = User::factory()->create();

    $this->deleteJson(route('api.users.destroy', $user->id))
        ->assertStatus(200)
        ->assertJson(['message' => 'User deleted successfully.']);

    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});
