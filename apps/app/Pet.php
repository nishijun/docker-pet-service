<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AnimalCategory;
use App\User;

class Pet extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'animal_category_id', 'price', 'body', 'pic1', 'pic2', 'pic3'];

    public function animalCategory() {
      return $this->belongsTo(AnimalCategory::class, 'animal_category_id', 'id');
    }

    public function user() {
      return $this->belongsTo(User::class);
    }
}
