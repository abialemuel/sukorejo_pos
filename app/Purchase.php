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

    public function user(){
        return $this->belongsTo( User::class, 'created_by', 'id' );
    }

    public function purchase_order(){
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function getTotalAmount() {
        return $this->price * $this->netto;
    }
}

