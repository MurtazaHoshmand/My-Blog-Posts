<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{   
    use SoftDeletes;
    protected $fillable = ['content', 'user_id'];
    public function blogPost(){
        return $this->belongsTo(blogPost::class,'blog_post_id');  
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public static function boot(){
        parent::boot();
        static::addGlobalScope(new LatestScope);
    }
    use HasFactory;
}

