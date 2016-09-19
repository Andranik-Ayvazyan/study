<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    public function notes ()
    {

        return $this->hasMany(Note::class);


    }
}
