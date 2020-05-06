<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{

    // public function details(){
    //     return $this->hasMany( TransactionDetail::class, 'transactions_id', 'id' );
    // }

    public function travel_package(){
        return $this->belongsTo( Sale::class, 'travel_packages_id', 'id' );
    }

    public function user(){
        return $this->belongsTo( Purchase::class, 'users_id', 'id' );
    }

    protected $guarded = [ ];

    public function purchases()
    {
        return $this->hasMany('App\Purchase');

    }
}
