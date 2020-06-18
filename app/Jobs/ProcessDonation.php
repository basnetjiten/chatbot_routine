<?php

namespace App\Jobs;

use App\Events\DonationAlertEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessDonation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $currentTransByDonorForStreamer;
   // public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @param $currentTransByDonorForStreamer
     */
    public function __construct($currentTransByDonorForStreamer)
    {
        $this->currentTransByDonorForStreamer = $currentTransByDonorForStreamer;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        event(new DonationAlertEvent($this->currentTransByDonorForStreamer));


    }

    /*public function retryUntil()
    {
        return now()->addSeconds(5);
    }*/
}
