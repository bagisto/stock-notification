<?php

namespace Webkul\Notify\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductBackInStockNotification extends Mailable  implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new mailable instance.
     *
     * @param  \Webkul\Notify\Contracts\Product  $product
     * @return void
     */
    public function __construct(public $product, public $customer)
    {
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\View\View
     */
    public function build()
    {
        return $this->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
            ->to($this->customer->email)
            ->subject('Product Back In Stock Notification')
            ->html('<h3>The product is now back in stock</h3>');
    }
}