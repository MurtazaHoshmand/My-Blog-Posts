<?php

namespace App\Models;

use App\Scopes\DeletedAdminScope;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class blogPost extends Model
{   
    use SoftDeletes;    
    protected $fillable = ['title', 'content', 'user_id'];

    public function comments(){
        return $this->hasMany(comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }

    public function scopeMostCommented($query, $direction = 'desc')
    {
        return $query->withCount('comments')->orderBy('comments_count', $direction);
    }
    public static function boot(){
        // static::addGlobalScope(new DeletedAdminScope);
        parent::boot();
        static::addGlobalScope(new LatestScope);
        static::deleting(function(BlogPost $blogPost){
            $blogPost->comments()->delete();
        });
    }
    use HasFactory;
}
