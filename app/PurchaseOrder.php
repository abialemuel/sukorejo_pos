<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;


class PurchaseOrder extends Model
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

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id' );
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }



}

