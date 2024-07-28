<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function blogPosts(){
        return $this->hasMany(BlogPost::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeWithMostBlogPosts(Builder $query){
        return $query->withCount('blogPosts')->orderBy('blog_posts_count','desc');
    }
    public function scopeWithMostBlogPostsLastMonth(Builder $query){
        return $query->withCount(
            ['blogPosts' => function (Builder $query){
            $query->whereBetween(static::CREATED_AT, [now()->subMonths(1), now()]);
        }])
        ->having('blog_posts_count', '>=', 2)
        ->orderBy('blog_posts_count','desc');
    }
}
