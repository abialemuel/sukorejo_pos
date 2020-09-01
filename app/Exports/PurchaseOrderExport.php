<?php

namespace App\Exports;

use App\PurchaseOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Http\Request;
use Config;

class PurchaseOrderExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $id = request()->route('id');
        $purchase_order = PurchaseOrder::findOrFail($id);
        return view('pages.excel.purchases_report', compact('purchase_order'));
    }   
}

