<?php

namespace GiveMeYourHelp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user have a role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsTo('GiveMeYourHelp\Role');
    }

    /**
     * A user have a permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permission()
    {
        return $this->belongsTo('GiveMeYourHelp\Permission');
    }

    /**
     * Check if the user is a staff member.
     *
     * @return true if the user is a staff member; false otherwise.
     */
    public function isStaff()
    {
        return $this->role->permission_id > 1;
    }

    /**
     * Check if the user is an administrator.
     *
     * @return true if the user is an administrator; false otherwise.
     */
    public function isAdmin()
    {
        return $this->role->permission_id > 2;
    }

    public function authorizeEdit() {
        if ($this->user()->isAdmin()) {
            return true;
        }

        $id = $route->parameter('users');

        if (!Auth::user()->users()->find($id)) {
            return Redirect::to('/');
        }        
    }
}