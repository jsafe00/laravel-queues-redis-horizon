<?php

namespace App\Jobs;

use App\Mail\EmailsSent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;
use Log;

class SendUserEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void 
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('my-mailtrap')->allow(2)->every(1)->then(function () {
        $recipient = 'josafebalili@gmail.com';
        
        Mail::to($recipient)->send(new EmailsSent());
        Log::info('Email Sent');

    }, function () {

        return $this->release(2);
        });
    }
}
