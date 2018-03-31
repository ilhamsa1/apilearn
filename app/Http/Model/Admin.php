<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'user_id'
    ];
    public function user() { $this->belongsTo( User::class);}
}
