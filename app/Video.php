<?php

namespace Desire2Learn;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable  =[
        'title',
        'url',
        'category',
        'description',
        'user_id',
    ];
    /**
     * A video belongs to one user.
     *
     * @return Object
     */
    public function user()
    {
        return $this->belongsTo('Desire2Learn\User');
    }

}
