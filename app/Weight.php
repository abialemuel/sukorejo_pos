<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Weight extends Model
{
    //
    use SoftDeletes;
    protected $table="weight_data";

    protected $fillable = [
        'brutto', 'netto', 'created_at', 'updated_at', 'created_by', 'updated_by'
    ];

    protected $hidden = [];


    // public function details(){
    //     return $this->hasMany( TransactionDetail::class, 'transactions_id', 'id' );
    // }

    // public function travel_package(){
    //     return $this->belongsTo( TravelPackage::class, 'travel_packages_id', 'id' );
    // }

    // public function user(){
    //     return $this->belongsTo( User::class, 'users_id', 'id' );
    // }
}
