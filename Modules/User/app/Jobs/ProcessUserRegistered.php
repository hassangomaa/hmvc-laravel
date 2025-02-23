<?php

namespace Modules\User\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\User\Events\UserRegistered;
use Modules\User\Models\User;

class ProcessUserRegistered implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        sleep(5);
        // for loop 100  time just log with counter
        for ($i = 0; $i < 100; $i++) {
            \Log::info('🟢 Job: ProcessUserRegistered Running for User ID: '.$this->user->id.' Counter: '.$i);
        }
        \Log::info('🟢 Job: ProcessUserRegistered Running for User ID: '.$this->user->id);
        event(new UserRegistered($this->user));
    }
}
