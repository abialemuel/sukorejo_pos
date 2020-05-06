<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $guarded = [ ];

    // public function details(){
    //     return $this->hasMany( TransactionDetail::class, 'transactions_id', 'id' );
    // }

    // public function travel_package(){
    //     return $this->belongsTo( TravelPackage::class, 'travel_packages_id', 'id' );
    // }

    // public function user(){
    //     return $this->belongsTo( User::class, 'users_id', 'id' );
    // }

    public function farmer()
    {
        return $this->belongsTo( Farmer::class, 'farmer_code', 'farmer_code' );
    }

}

