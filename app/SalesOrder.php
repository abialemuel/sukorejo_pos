<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;


class SalesOrder extends Model
{
    //
    use Blameable;
    use SoftDeletes;   

    protected $guarded = [ ];

    protected $fillable = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id' );
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function payment_logs(){
        return $this->morphMany(PaymentLog::class, 'paymentable');
    }

    public function getSOId() {
        $dateformat = str_replace('-','/', substr($this->sold_at,0,8));

        return 'SO/' . $dateformat . $this['id'];
    }

    public function getStringDate() {
        return substr($this->sold_at,0,10);
    }

    public function isPaid() {
        return ($this->amount == $this->payment_logs->sum('amount')) ? 'Lunas' : 'Belum';
    }
}

