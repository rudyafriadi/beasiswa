<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'nama_universitas','status','alamat','akreditasi'
    ];

    public function Member()
    {
        return $this->hasMany("App\Member");
    }
}
