<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Purchase extends Model
{
    //
    use SoftDeletes;

    protected $guarded = [ ];

    protected $fillable = [
        
    ];


    public function farmer()
    {
        return $this->belongsTo(Fermer::class);
    }


}

