<?php

namespace App\Events;

use App\Models\Donor;
use App\Models\Transaction;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DonationAlertEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $currentTransByDonorForStreamer;

    /**
     * Create a new event instance.
     *
     * @param Transaction $currentTransByDonorForStreamer
     */
    public function __construct(Transaction $currentTransByDonorForStreamer)
    {
        $this->currentTransByDonorForStreamer = $currentTransByDonorForStreamer;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
       // dd( $this->currentTransByDonorForStreamer.$this->currentTransByDonorForStreamer->streamer->id.$this->currentTransByDonorForStreamer->donor->name);

        return new Channel('donation-alert' . $this->currentTransByDonorForStreamer->streamer->id);
    }


    public function broadcastWith()
    {
        return [

            'amount' => $this->currentTransByDonorForStreamer->amount,
            'donor' => [
                'name' => $this->currentTransByDonorForStreamer->donor->name
            ],
            'message' => $this->currentTransByDonorForStreamer->message
        ];
    }
}
