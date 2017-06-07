<?php

namespace GiveMeYourHelp;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    /**
     * A permission can have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->hasMany('GiveMeYourHelp\Role');
    }

    /**
     * A permission can have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->hasMany('GiveMeYourHelp\Role');
    }
}