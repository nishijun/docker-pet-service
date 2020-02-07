<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Message;

class Board extends Model {
    protected $fillable = ['sell_user_id', 'buy_user_id', 'pet_id'];

    public function user() {
      return $this->belongsTo(User::class, 'sell_user_id');
    }

    public function messages() {
      return $this->hasMany(Message::class);
    }
}
