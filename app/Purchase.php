<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Purchase extends Model
{
    //
    use Blameable;
    use SoftDeletes;   

    protected $guarded = [ ];

    protected $fillable = [
        
    ];


    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }


}

