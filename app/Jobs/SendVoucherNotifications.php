<?php

namespace App\Jobs;

use App\Mail\NewVoucherForCompanyMail;
use App\Models\Voucher;
use App\Notifications\NewVoucherNotification;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendVoucherNotifications
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Voucher $voucher)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->voucher->user->notify(
            new NewVoucherNotification($this->voucher)
        );

        if ($this->voucher->company->email) {
            Mail::to($this->voucher->company->email)
                ->send(new NewVoucherForCompanyMail($this->voucher));
        }
    }
}
