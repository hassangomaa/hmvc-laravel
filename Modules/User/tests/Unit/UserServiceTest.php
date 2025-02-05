<?php

namespace Modules\User\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\UniqueConstraintViolationException;
use Modules\User\Models\User;
use Modules\User\Services\UserService;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    protected UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = app(UserService::class);
    }

    public function test_can_create_user()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe123@example.com',
            'password' => 'password123',
        ];

        $user = $this->userService->createUser($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function test_cannot_create_user_with_existing_email()
    {
        User::factory()->create(['email' => 'existing123@example.com']);

        $this->expectException(UniqueConstraintViolationException::class);

        $this->userService->createUser([
            'name' => 'Jane Doe',
            'email' => 'existing123@example.com',
            'password' => 'password123',
        ]);
    }

    public function test_can_get_all_users()
    {
        User::factory()->count(3)->create();

        $users = $this->userService->getAllUsers();

        $this->assertCount(3, $users);
    }

    public function test_can_get_user_by_id()
    {
        $user = User::factory()->create();

        $retrievedUser = $this->userService->getUserById($user->id);

        $this->assertEquals($user->id, $retrievedUser->id);
    }

    public function test_can_update_user()
    {
        $user = User::factory()->create();

        $updatedData = [
            'name' => 'Updated Name',
            'email' => 'updated123@example.com',
            'password' => 'newpassword123',
        ];

        $updatedUser = $this->userService->updateUser($user->id, $updatedData);

        $this->assertEquals('Updated Name', $updatedUser->name);
        $this->assertEquals('updated123@example.com', $updatedUser->email);
        $this->assertDatabaseHas('users', ['email' => 'updated123@example.com']);
    }

    public function test_cannot_update_user_with_existing_email()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $this->expectException(UniqueConstraintViolationException::class);

        $this->userService->updateUser($user1->id, [
            'name' => 'Updated Name',
            'email' => $user2->email, // Email already exists
        ]);
    }

    public function test_can_delete_user()
    {
        $user = User::factory()->create();

        $this->userService->deleteUser($user->id);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
