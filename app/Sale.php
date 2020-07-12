<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    //
    use Blameable;
    use SoftDeletes;  

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
}
