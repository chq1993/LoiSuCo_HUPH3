<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Errors extends Model
{
    protected $table = 'errors';
    protected $fillable = [
        'error', 'description','upLoadFile','status', 'created_by', 'updated_by'
    ];
}
