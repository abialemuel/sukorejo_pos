<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\Blameable;

class Weight extends Model
{
    //
    use SoftDeletes;
    use Blameable;
    protected $table="weight_data";

    protected $fillable = [
        'bruto', 'netto', 'created_at', 'updated_at', 'created_by', 'updated_by'
    ];

    protected $hidden = [];


    public function user(){
        return $this->belongsTo( User::class, 'created_by', 'id' );
    }
}
