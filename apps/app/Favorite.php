<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pet;

class Favorite extends Model
{
  protected $fillable = ['pet_id', 'user_id'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function pet() {
    return $this->belongsTo(Pet::class);
  }
}
