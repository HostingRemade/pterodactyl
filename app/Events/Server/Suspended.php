<?php

namespace Pterodactyl\Events\Server;

use Pterodactyl\Models\Server;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Suspended
{
    use Dispatchable, SerializesModels;

    public $server;

    /**
     * Create a new event instance.
     *
     * @param \Pterodactyl\Models\Server $server
     * @return void
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
    }
}
