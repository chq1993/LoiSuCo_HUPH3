<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directions_Specialists extends Model
{
    protected $table = 'directions_specialists';
    protected $fillable = [
        'direction_division_id', 'specialist_id','note', 'created_by', 'updated_by'
    ];
}
