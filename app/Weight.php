<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Weight extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'brutto', 'netto', 'created_at', 'updated_at', 'created_by', 'updated_by'
    ];

    protected $hidden = [];
}
