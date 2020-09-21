<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directions_Rectors extends Model
{
    protected $table = 'directions_rectors';
    protected $fillable = [
        'error_id', 'rector','note', 'created_by', 'updated_by'
    ];
}
