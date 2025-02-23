<?php

namespace Modules\User\Observers;

use Illuminate\Support\Facades\Log;
use Modules\User\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user)
    {
        Log::info("🟢 User Created: ID {$user->id}, Email: {$user->email}");
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user)
    {
        Log::info("🟡 User Updated: ID {$user->id}, Changed Attributes: ".json_encode($user->getChanges()));
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user)
    {
        Log::warning("🔴 User Deleted: ID {$user->id}");
    }

    /**
     * Handle the User "restored" event (for soft deletes).
     */
    public function restored(User $user)
    {
        Log::info("♻️ User Restored: ID {$user->id}");
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user)
    {
        Log::error("❌ User Permanently Deleted: ID {$user->id}");
    }
}
