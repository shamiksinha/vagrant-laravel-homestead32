<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;
use App\Model\PaymentRequest;

class SubscriptionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $_user;
    public $_paymentRequest;
    

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user,PaymentRequest $paymentRequest)
    {
        $this->_user=$user;
        $this->_paymentRequest=$paymentRequest;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
