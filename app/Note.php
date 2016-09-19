<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = ['title'];

    public function cards ()
    {

        return $this->belongsTo(Cards::class);

    }
}
