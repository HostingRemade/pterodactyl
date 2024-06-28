<?php

namespace Pterodactyl\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Pterodactyl\Models\Server;

class ServerSuspended extends Mailable
{
    use Queueable, SerializesModels;

    public $server;

    /**
     * Create a new message instance.
     *
     * @param \Pterodactyl\Models\Server $server
     * @return void
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ServerSuspended')
                    ->with(['server' => $this->server]);
    }
}
