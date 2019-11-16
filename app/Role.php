<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'nama_role'
    ];

    public function User()
    {
        return $this->belongsTo("App\User");
    }
}
