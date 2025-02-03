<?php

namespace App\Models;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'description',
        'storage_path',
        
    ];

    public function Comments($post)
    {
        return  Posts::query()
        ->select('comments.*','users.name as user_name','users.id as user_id','users.photo_path','posts.id')
        ->join('comments','comments.post_id', "=", "posts.id")
        ->join('users','users.id', "=", "comments.user_id")
        ->where('posts.id',$post)
        ->orderBy('comments.created_at','desc' )
        ->get(); 
    }

  
}
