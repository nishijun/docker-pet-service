<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Pet;
use App\Prefecture;
use App\Board;
use App\Favorite;

class User extends Authenticatable
{
    use Notifiable;
    use \Awobaz\Compoships\Compoships;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'email', 'password', 'gender', 'age', 'prefecture_id', 'thumbnail'];

    public function pets() {
      return $this->hasMany('Pet');
    }

    public function precture() {
      return $this->belongsTo('Precture');
    }

    public function boards() {
      return $this->hasMany('Board', ['sell_user_id', 'buy_user_id']);
    }

    public function favorites() {
      return $this->hasMany('Favorite');
    }
}
