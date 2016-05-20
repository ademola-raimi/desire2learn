<?php

namespace Desire2Learn;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];

    /**
     * Define users table relationship
     */
    public function userRole()
    {
        return $this->hasMany('Desire2Learn\User');
    }
}
