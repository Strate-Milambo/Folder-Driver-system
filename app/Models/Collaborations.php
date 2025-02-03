<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborations extends Model
{
    use HasFactory;

    public function coworkers()
    {
        return $this->belongsToMany(Collaborations::class,'second_users');
    }
}
