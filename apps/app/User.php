<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Pet;
use App\Prefecture;
use App\Board;
use App\Favorite;

class User extends Authenticatable
{
    use Notifiable;
    use \Awobaz\Compoships\Compoships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'gender', 'age', 'prefecture_id', 'thumbnail'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
