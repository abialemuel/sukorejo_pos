<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Farmer extends Model
{

    use Blameable;
    use SoftDeletes;    

    protected $fillable = [
        'farmer_code', 'name', 'area', 'address', 'created_by', 'updated_by',
    ];

    protected $guarded = [ ];

    // public function purchases()
    // {
    //     return $this->hasMany('App\Purchase');

    // }
    
    public function user()
    {
        return $this->belongsTo(Farmer::class, 'farmer_code', 'farmer_code');
    }
    
}
