<?php

namespace App\Policies;

use App\Models\TheLoaiModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TheloaiPolicy
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
     * @param  \App\Models\TheLoaiModel  $theLoaiModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TheLoaiModel $theloai)
    {
        return (
            $theloai->status == TheLoaiModel::STATUS_PUBLISHED ||
            ($user && (
                $user->id == $theloai->user_id
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoaiModel  $theLoaiModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TheLoaiModel $theloai)
    {
        return $user->hasVerifiedEmail();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoaiModel  $theLoaiModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TheLoaiModel $theloai)
    {
        return ($user->id == $theloai->user_id || $user->hasPermission('theloai_post'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoaiModel  $theLoaiModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TheLoaiModel $theloai)
    {
        return ($user->id == $theloai->user_id || $user->hasPermission('theloai_post'));
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoaiModel  $theLoaiModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TheLoaiModel $theloai)
    {
        return ($user->id == $theloai->user_id || $user->hasPermission('force_delete_post'));
    }
}
