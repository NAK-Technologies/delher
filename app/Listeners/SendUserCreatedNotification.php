<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Jobs\SendUserCreatedMailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $delay = now()->addSeconds(3);
        SendUserCreatedMailJob::dispatch($event->user, $event->password)->delay($delay);
    }
}
