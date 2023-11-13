<?php

namespace App\Jobs;

use App\Mail\EmailNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;


class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $details;

    /**
     * Create a new job instance.
     */
    public function __construct($details)
    {
        $this->details = $details;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $leads = Lead::where('lead_type_id', 1)->get();

        foreach($leads as $key => $value)
        {
            $email = new EmailNewsletter($this->details);
            Mail::to($value->email)->send($email);
        }

    }
}
