<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Favorite extends Model
{
  protected $fillable = ['pet_id'];

  public function user() {
    return $this->belongsTo('User');
  }
}
