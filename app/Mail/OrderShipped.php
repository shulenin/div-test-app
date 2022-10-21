<?php

namespace App\Mail;

use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Request
     */
    public $request;

    /**
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return OrderShipped
     */
    public function build(): OrderShipped
    {
        return $this->view('emails.requests.shipped');
    }
}
