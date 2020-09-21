<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directions_Divisions extends Model
{
    protected $table = 'directions_divisions';
    protected $fillable = [
        'direction_rector_id', 'division_id','note', 'created_by', 'updated_by'
    ];
}
