<?php

namespace App\Exports;

use App\PurchaseOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;


class PurchaseOrderDailyExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $tanggal = request()->input('purchased_at');
        $purchase_order = DB::table('purchase_orders')
                ->join('purchases', 'purchases.purchase_order_id', '=', 'purchase_orders.id')
                ->join('farmers', 'farmers.id', '=', 'purchase_orders.farmer_id')
                ->join(DB::raw('(SELECT paymentable_id, SUM(amount) AS total_paid
                                FROM payment_logs pl 
                                WHERE paymentable_type LIKE "%Purchase%"
                                GROUP BY 1)total_paid'), 
                        function($join)
                        {
                            $join->on('purchase_orders.id', '=', 'total_paid.paymentable_id');
                        })
                ->select(DB::raw("DATE_FORMAT(purchases.created_at , '%Y-%m-%d') AS created_at, 
                                  CONCAT('PO/', EXTRACT(year FROM purchased_at), '/', EXTRACT(month FROM purchased_at), '/', farmers.farmer_code, '/', purchase_orders.id) AS nomor_nota,
                                  farmers.farmer_code AS farmer_code,
                                  farmers.name AS farmer_name,
                                  purchases.ac_code AS ac_code,
                                  purchases.seri_tani AS seri_tani,
                                  purchases.bruto AS bruto,
                                  purchases.netto AS netto,
                                  purchases.price AS price,
                                  purchases.price * purchases.netto AS jumlah,
                                  total_paid.total_paid as total_paid,
                                  IF(total_paid.total_paid>=purchase_orders.amount,'Lunas','Belum Lunas') AS status"))
                ->whereDate('purchase_orders.created_at', $tanggal)
                ->get();
        return view('pages.excel.purchases_reportharian', compact('purchase_order'));
    }   
}
