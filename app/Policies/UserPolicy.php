<?php

namespace App\Policies;

use App\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return  $this->getPermission($user,8);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(admin $user)
    {
        return  $this->getPermission($user,9);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(admin $user)
    {
        return  $this->getPermission($user,10);
    }

    protected  function getPermission($user,$p_id){
        foreach ($user->roles as $role){

            foreach ($role->permissions as $permission){
                if($permission->id == $p_id){
                    return true;
                }

            }
        }
        return false;
    }
}
