<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendOrderNotification implements ShouldQueue
{
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
    public function handle(OrderCreated $event): void
    {
        Notification::send(
            $event->order->user,
            new OrderNotification(
                $event->order,
                $event->order->order_items,
                $event->total_price,
                $event->after_voucher,
                $event->vouchers
            )
        );
    }
}
