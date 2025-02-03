<?php

namespace App\Models;

use App\Models\User;
use App\Models\user_priority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_priority extends Model
{
    use HasFactory;

    protected $fillable=[
        'users_id',
        'coworkers'
    ];

    public function users()
    {
        $this->hasManyThrough(User::class,User::class,"coworkers","users_id");
    }
}
