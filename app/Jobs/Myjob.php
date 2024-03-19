<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\Testing;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;

class Myjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle():void
    {
        Mail::to($this->user['email'])->send(new Testing($this->user));
        //
    }
}
