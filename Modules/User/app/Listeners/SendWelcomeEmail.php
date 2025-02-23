<?php

namespace Modules\User\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Mail;
use Modules\User\Events\UserRegistered;

class SendWelcomeEmail implements ShouldQueue
{
    public function handle(UserRegistered $event)
    {
        Log::info('🟢 Listener: SendWelcomeEmail Handling Event for User ID: '.$event->user->id);
        sleep(5);
        // Simulate sending an email (Replace with actual Mail logic)
        Log::info('📧 Sending Welcome Email to '.$event->user->email);
    }
}
