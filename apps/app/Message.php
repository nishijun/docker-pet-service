<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Board;
use App\User;

class Message extends Model
{
    protected $fillable = ['body', 'send_date', 'send_user_id', 'recieve_user_id', 'board_id'];

    public function board() {
      return $this->belongsTo(Board::class);
    }

    public function user() {
      return $this->belongsTo(User::class, 'send_user_id');
    }
}
