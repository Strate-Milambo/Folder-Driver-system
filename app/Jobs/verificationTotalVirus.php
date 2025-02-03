<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;


class verificationTotalVirus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;
    public $data;
    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct(array $data, $user)
    {
        $this->data=$data;
        $this->user=$user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach($this->data as $files){
            $result=( new VirusTotal("386a4cb74ac6700801f3da9389474c47a0d06de66b070d8c4b55c0e46f2ae652"))
                ->scanFile($files);
        }
        if(!$result['successful']){
            $this->user->notify(scanFilesWithTotalVirus());
        }
       
    }
}
