<?php

namespace App\Listeners\User;

use App\Events\User\Registered;
use App\Mail\Welcome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisteredListener implements ShouldQueue
{
    public $delay = 5; // just for local development testing, can be more or less

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Log::info("Going to sending email");
        $user = $event->getUser();
        Mail::to($user->email)->send(new Welcome($user));
    }
}
