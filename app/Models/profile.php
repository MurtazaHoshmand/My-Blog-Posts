<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function author(){
        return $this->belongsTo('App\Author');
    }
    use HasFactory;
}
