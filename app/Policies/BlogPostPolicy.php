<?php

namespace App\Policies;

use App\Models\User;
use App\Models\blogPost;
use Illuminate\Auth\Access\Response;

class BlogPostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, blogPost $blogPost): bool
    {
        //
    }
    

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, blogPost $blogPost): bool
    {
        return $user->id === $blogPost->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, blogPost $blogPost): bool
    {
        return $user->id === $blogPost->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, blogPost $blogPost): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, blogPost $blogPost): bool
    {
        //
    }
}
