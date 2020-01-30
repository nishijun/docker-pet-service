<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Board;

class Message extends Model
{
    protected $fillable = ['body', 'send_date'];

    public function board() {
      return $this->belongsTo('Board');
    }
}
