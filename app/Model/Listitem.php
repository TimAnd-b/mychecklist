<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Listitem extends Model
{

    protected $table = 'listsitems';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'done', 'created_at', 'updated_at',
    ];

    public function checklist()
    {
        return $this->hasOne('App\Model\Checklist');
    }
}
