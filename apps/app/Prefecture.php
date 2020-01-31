<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Prefecture extends Model
{
    protected $fillable = ['name'];

    public function users() {
      return $this->hasMany('User');
    }
}
