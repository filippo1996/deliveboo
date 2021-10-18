<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $idOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order, $_idOrder)
    {
        $this->order = $_order;
        $this->idOrder = $_idOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order_confirm');
    }
}
