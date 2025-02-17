<?php

namespace App\Jobs;

use Exception;
use App\Models\File;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadFileToCloudJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected File $file)
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $model = $this->file;

        if(!$model->uploaded_on_cloud){
            $localPath = Storage::disk('local')->path($model->storage_path);
            Log::debug("Uploading file on s3. " . $localPath);
            try {
                $success= Storage::put($model->storage_path, Storage::disk('local')
                ->get($model->storage_path));
                if($success){
                    Log::debug("Uploaded. Updating the database");
                    $model->uploaded_on_cloud=1;
                    $model->save();
                }else{
                    Log::error('Unable to upload files to s3');
                }
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }


    }
}
