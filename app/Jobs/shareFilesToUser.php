<?php

namespace App\Jobs;

use App\Mail\ShareFilesMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\sendFolderNotifications;

class shareFilesToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Notifiable;
    public $user;
    public $auth;
    public $files;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $auth, $files)
    {
        $this->user=$user;
        $this->files=$files;
        $this->auth=$auth;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user)->send(new ShareFilesMail($this->user, $this->auth,$this->files));

    }
}
