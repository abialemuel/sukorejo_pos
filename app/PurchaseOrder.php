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

    public function payment_logs(){
        return $this->morphMany(PaymentLog::class, 'paymentable');
    }

    public function getPOId() {
        $dateformat = str_replace('-','/', substr($this->purchased_at,0,8));
        $farmer_code = $this->farmer['farmer_code'];

        return 'PO/' . $dateformat . $farmer_code . '/' . $this['id'];
    }

    public function getStringDate() {
        return substr($this->purchased_at,0,10);
    }

    public function isPaid() {
        return ($this->amount == $this->totalPaid()) ? 'Lunas' : 'Belum Lunas';
    }

    public function getPaidDate() {
        return ($this->isPaid() == 'Lunas') ? $this->getStringDate() : 'Belum Lunas';
    }

    public function totalPaid() {
        $total = 0;
        foreach ($this->purchases as $purchase) {
            $total += $purchase->payment_logs->sum('amount');
        }
        return $total;
    }
}

