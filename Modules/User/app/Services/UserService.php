<?php

namespace Modules\User\Services;

use Modules\User\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    /**
     * Inject the UserRepository.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all users.
     */
    public function getAllUsers(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->userRepository->getAll();
    }

    /**
     * Create a new user.
     */
    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * Get a user by ID.
     */
    public function getUserById($id)
    {
        return $this->userRepository->findById($id);
    }

    /**
     * Update a user by ID.
     */
    public function updateUser($id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    /**
     * Delete a user by ID.
     */
    public function deleteUser($id): true
    {
        return $this->userRepository->delete($id);
    }
}
