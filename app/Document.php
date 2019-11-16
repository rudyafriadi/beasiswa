<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'nim','nama','file1','file2','file3','file4','file5','file6','file7','user_id','tipe','status'
    ];
}
