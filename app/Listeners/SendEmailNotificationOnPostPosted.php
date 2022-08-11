<?php

namespace App\Listeners;

use App\Events\PostPosted;
use App\Jobs\SendEmailJob;
use App\Mail\PostPostedMail;
use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailNotificationOnPostPosted
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\PostPosted  $event
     * @return void
     */
    public function handle(PostPosted $event)
    {
        Subscriber::all()
            ->map(function (Subscriber $subscriber){
                SendEmailJob::dispatch(
                    new PostPostedMail(),
                    $subscriber
                );
            });

    }
}
