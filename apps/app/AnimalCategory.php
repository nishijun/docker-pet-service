<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pet;

class AnimalCategory extends Model {
    protected $table = 'animal_categories';
    protected $fillable = ['name'];

    public function pets() {
      return $this->hasMany('Pet', 'animal_category_id');
    }
}
