<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'created_at', 'updated_at',
    ];

    public function user()
    {
        return $this->hasOne('App\Model\User');
    }

    public function listitems()
    {
        return $this->hasMany('App\Model\ListItem');
    }

}
