<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostPostedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $post;
    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post, Subscriber $subscriber)
    {
        $this->post = $post;
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "A new blog post was publised on SimpleNotification Blog";
        return $this
            ->subject($subject)
            ->markdown('emails.post-posted-mail');
    }
}
