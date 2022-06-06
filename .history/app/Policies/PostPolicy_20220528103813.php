<?php

namespace App\Policies;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PostModel $post)
    {
        return (
            $post->status == PostModel::STATUS_PUBLISHED ||
            ($user && (
                $user->id == $post->user_id
                || $user->hasPermission('review_post')
            ))
        );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasVerifiedEmail();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PostModel  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PostModel $post)
    {
        return ($user->id == $post->user_id || $user->hasPermission('update_post'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PostModel $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PostModel $post)
    {
        return ($user->id == $post->user_id || $user->hasPermission('delete_post'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PostModel  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PostModel $post)
    {
        return ($user->id == $post->user_id || $user->hasPermission('restore_post'));
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PostModel $post)
    {
        return ($user->id == $post->user_id || $user->hasPermission('force_delete_post'));
    }
}
