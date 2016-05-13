<?php

namespace Desire2Learn;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];
    /**
     * A Category belongs to many videos
     *
     * @return Object.
     */
    public function videos()
    {
        return $this->belongsToMany('Desire2Learn\Video');
    }
}
