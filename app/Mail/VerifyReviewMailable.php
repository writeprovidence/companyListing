<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyReviewMailable extends Mailable
{
    use Queueable, SerializesModels;

    public  $review_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $review_id)
    {
        $this->review_id = $review_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.review');
    }
}
