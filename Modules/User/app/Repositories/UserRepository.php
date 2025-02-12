<?php

namespace Modules\User\Repositories;

use Modules\User\Models\User;

class UserRepository
{
    /**
     * Get all users.
     */
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return User::all();
    }

    /**
     * Create a new user.
     */
    public function create(array $data)
    {
        return User::create($data);
    }

    /**
     * Find a user by ID.
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update a user by ID.
     */
    public function update($id, array $data)
    {
        $user = $this->findById($id);
        $user->update($data);

        return $user;
    }

    /**
     * Delete a user by ID.
     */
    public function delete($id): true
    {
        $user = $this->findById($id);
        $user->delete();

        return true;
    }
}
