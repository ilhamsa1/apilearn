<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
   protected $fillable = ['name','email','role'];

   public function admin() { return $this->hasOne(Admin::class, 'user_id');}
   public function member() { return $this->hasOne(Member::class, 'user_id');}
   public function owner() { return $this->hasOne(Owner::class, 'user_id');}
}
