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
                ->select(DB::raw("DATE_FORMAT(purchases.created_at , '%Y-%m-%d') AS created_at, 
                                  farmers.farmer_code AS farmer_code,
                                  farmers.name AS farmer_name,
                                  purchases.ac_code AS ac_code,
                                  purchases.seri_tani AS seri_tani,
                                  purchases.bruto AS bruto,
                                  purchases.netto AS netto,
                                  purchases.price AS price,
                                  purchases.price * purchases.netto AS jumlah,
                                  IF(purchases.price>purchases.netto,'Lunas','Belum Lunas') AS status"))
                ->get();
        return view('pages.excel.purchases_reportharian', compact('purchase_order'));
    }   
}
