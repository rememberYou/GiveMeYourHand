<?php

namespace GiveMeYourHelp;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    /**
     * A role can have many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->hasMany('GiveMeYourHelp\User');
    }

    /**
     * A role have a permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permission()
    {
        return $this->belongsTo('GiveMeYourHelp\Permission');
    }
}