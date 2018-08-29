<?php

namespace App\Events;

use App\ProductAd;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReviewProduct implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    /**
     * Create a new event instance.
     * @param ProductAd $product
     * @param int $adminId
     */
    public function __construct(ProductAd $product, int $adminId)
    {
        $this->product = $product;
        $product->update(['admin_id' => $adminId]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('review-product');
    }

    public function broadcastWith()
    {
        return [
            'product_id' => $this->product->id
        ];
    }
}
