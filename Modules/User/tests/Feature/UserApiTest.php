<?php

namespace Modules\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\User;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {

        parent::setUp();
        $users = User::factory()->count(1)->create();
        $this->actingAs($users[0]);
    }

    public function test_can_list_users()
    {
        User::factory()->count(5)->create();

        $this->getJson(route('api.users.index'))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'email', 'created_at', 'updated_at'],
                ],
            ]);
    }

    public function test_can_create_user()
    {
        $payload = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
        ];

        $this->postJson(route('api.users.store'), $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => ['id', 'name', 'email', 'created_at', 'updated_at'],
            ]);

        $this->assertDatabaseHas('users', [
            'email' => $payload['email'],
        ]);
    }

    public function test_cannot_create_user_with_existing_email()
    {
        $existingUser = User::factory()->create();

        $payload = [
            'name' => 'Jane Doe',
            'email' => $existingUser->email, // Duplicate email
            'password' => 'password123',
        ];

        $this->postJson(route('api.users.store'), $payload)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_can_view_single_user()
    {
        $user = User::factory()->create();

        $this->getJson(route('api.users.show', $user->id))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ]);
    }

    public function test_can_update_user()
    {
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
                    'email' => $payload['email'],
                ],
            ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => $payload['email'],
        ]);
    }

    public function test_cannot_update_user_with_existing_email()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $payload = [
            'name' => 'Updated Name',
            'email' => $user2->email, // Email already exists
        ];

        $this->putJson(route('api.users.update', $user1->id), $payload)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_can_delete_user()
    {
        $user = User::factory()->create();

        $this->deleteJson(route('api.users.destroy', $user->id))
            ->assertStatus(200)
            ->assertJson(['message' => 'User deleted successfully.']);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
