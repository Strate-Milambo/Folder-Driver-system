<?php

namespace App\Models;

use App\Models\StarredFile;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\DB;
use App\Traits\HasCreatorAndUpdater;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model 
{
    use HasFactory, NodeTrait,SoftDeletes,HasCreatorAndUpdater;

    public function user()
    { 
        return $this->belongsTo(User::class, 'created_by');
    }
    public function parent()
    {
        return $this->belongsTo(File::class, 'parent_id');
    }
    public function isOwnerBy($userId): bool
    {
        return $this->created_by == $userId;
    }
    public function isRoot()
    {
        return $this->parent_id == null;
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            if(!$model->parent)
            {
                return;
            }
            $model->path = ($model->parent->isRoot() ? $model->parent->path : '') . Str::slug($model->name);
        });

        // static::deleted(function(File $model){
        //     if(!$model->is_folder){
        //         Storage::delete($model->storage_path);
        //     }
        // });
    }

    public function owner()
    {
       
      $i=0;
       $filesByUsers= DB::table('files')
            ->select('files.name as file','files.parent_id')
            ->join('file_shares',function (JoinClause $join) {
                $join->on('file_shares.file_id', '=', 'files.id');
            })
            
            ->join('user_priorities', function (JoinClause $join){
                $join->on('file_shares.receiver_id','=','user_priorities.users_id');
            })
            ->join('collaborations', function(JoinClause $join){
                $join->on('file_shares.receiver_id','=','collaborations.first_users');
            })
            ->join('users', 'users.id','user_priorities.users_id')
            ->where('file_shares.receiver_id',Auth::id())
            ->distinct()
            ->get();
        
        
        
        foreach($filesByUsers as $file){
          
            if( $file->file == $this->name){
               
                if($file->parent_id == Auth::id()){
                    
                    return "me";
                }else{
                    return User::find($file->parent_id)->name;
                }
            }
        
        }
        
    }
    public function get_file_size()
    {
        $units=['o','Ko','Mo', 'Go', 'To', 'Po'];

        $power = $this->size > 0 ? floor(log($this->size,1024)) : 0;

        return number_format($this->size/pow(1024,$power),2,'.',',')." ". $units[$power];
    }

    public function moveToTrash()
    {
        $this->deleted_at = Carbon::now();

        return $this->save();
    }

    public function starred()
    {
        return $this->hasOne(StarredFile::class,'file_id','id')
                    ->join('files','files.id','starred_files.file_id')
                    ->where('files.parent_id', Auth::id());
    }       

    public function deleteForever()
    {
        $this->deleteFilesFromStorage([$this]);
        $this->forceDelete();
    }

    public function deleteFilesFromStorage($files)
    {
        foreach ($files as $file) {
            if ($file->is_folder) {
                $this->deleteFilesFromStorage($file->children);
            } else {
                
                // $star = StarredFile::where('file_id',$file->id)->get();
                // Storage::delete($star);
                Storage::delete($file->storage_path);
            }
        }
    }

    public static function getSharedWithMe()
    {

    
        return File::query()
            ->select('files.*','file_shares.created_at')
            ->join('file_shares','file_shares.file_id','files.id')
            ->join('user_priorities', 'user_priorities.users_id','file_shares.receiver_id') // requette which marks importants
            ->join('collaborations', 'collaborations.first_users','file_shares.receiver_id')
            // ->join('users','users.id','files.parent_id')
            // ->where('files.parent_id', !Auth::id())
            ->where('file_shares.receiver_id',Auth::id())
            ->DISTINCT()
            ->orderBy('file_shares.created_at', 'desc')
            ->orderBy('files.id', 'desc');
        //    dd($f->get());
    }
    public static function getSharedByMe()
    {
        return File::query() 
        ->select('files.*')                                                                                      
        ->join('file_shares','file_shares.file_id','files.id')
        ->where('files.created_by', Auth::id())
        ->orderBy('file_shares.created_at', 'desc')
        ->orderBy('files.id', 'desc');
    }
    public  static function getFavourites()
    {
        return File::query()
        ->select('files.*')
        ->join('starred_files', 'starred_files.file_id', 'files.id')
        ->join('users', 'users.id', 'files.parent_id')
        ->where('files.created_by', Auth::id())
        ->orderBy('starred_files.created_at', 'desc');

    }

}
 