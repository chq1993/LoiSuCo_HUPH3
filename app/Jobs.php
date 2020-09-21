<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';
    protected $fillable = [
        'user_id', 'division_id','position_id', 'created_by', 'updated_by'
    ];
}
