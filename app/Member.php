<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'nim','nama','alamat','tpt_lahir','tgl_lahir','jkel','th_masuk','j_study','university_id','role_id','status'
    ];

    public function university()
    {
        return $this->belongsTo("App\University");
    }

    public function role()
    {
        return $this->belongsTo("App\Role");
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
