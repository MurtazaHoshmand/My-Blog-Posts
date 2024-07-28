<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{   
    public function profile(){
        return $this->hasOne("App\Profile");
    }
    use HasFactory;
}
