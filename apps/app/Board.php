<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Message;

class Board extends Model
{
    use \Awobaz\Compoships\Compoships;
    protected $fillable = [];

    public function user() {
      return $this->belongsTo('User', ['sell_user_id', 'buy_user_id']);
    }

    public function messages() {
      return $this->hasMany('Message');
    }
}
