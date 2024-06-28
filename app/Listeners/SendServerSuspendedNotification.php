<?php

namespace Pterodactyl\Listeners;

use Pterodactyl\Events\Server\Suspended;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Pterodactyl\Mail\ServerSuspended;

class SendServerSuspendedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param \Pterodactyl\Events\Server\Suspended $event
     * @return void
     */
    public function handle(Suspended $event)
    {
        // Send an email notification
        Mail::to($event->server->user->email)->send(new ServerSuspended($event->server));
    }
}
