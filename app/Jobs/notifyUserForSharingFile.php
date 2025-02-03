<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\sendFolderNotifications;

class notifyUserForSharingFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user;
    public $files;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $files)
    {
        $this->user=$user;
        $this->files=$files;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->notify(new sendFolderNotifications($this->files));

    }
}
