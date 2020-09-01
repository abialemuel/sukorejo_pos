<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\PurchaseOrder;
use App\PaymentLog;
use App\Farmer;
use App\Weight;
use PDF;
use Debugbar;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchaseOrderExport;
use App\Exports\PurchaseOrderDailyExport;


class PurchasesController extends Controller
{
    public function index()
    {
        //
        $purchase_orders = PurchaseOrder::all();

        return view('pages.purchases.index',compact('purchase_orders'));
    }

    public function create()
    {
        //
        $farmers = Farmer::all();

        return view('pages.purchases.create',compact('farmers'));
    }

    public function store(Request $request)
    {
        //
        $submit_value = $request->input('submit_value');
        $farmer_id = $request->input('farmer_id');
        $amount = $request->input('txttotal');
        $purchases = $request->input('purchases');
        $purchased_at = $request->input('purchased_at');

        # create purchase_order
        $purchase_order = PurchaseOrder::create([
            'farmer_id' => $farmer_id,
            'purchased_at' => $purchased_at,
            'amount' => $amount,
        ]);

        # create purchased items
        foreach ($purchases as $purchase) {
            $paid_amount = $purchase['amount'];
            unset($purchase['amount']);
            unset($purchase['total']);
            $purchased_item = Purchase::create($purchase + ['purchase_order_id' => $purchase_order->id]);

            # create payment log each purchased item
            $payment_log = new PaymentLog([
                'amount' => $paid_amount,
            ]);
            $purchased_item->payment_logs()->save($payment_log);
        }

        # additional action for print
        if ($submit_value == 'simpan_cetak') {
            return response()->json($purchase_order);
        }

        return redirect()->route('purchases.index');
    }

    public function show($id)
    {
        //
        $purchase_orders = PurchaseOrder::findOrFail($id);

        return view('pages.purchases.detail',[
            'purchase_orders' => $purchase_orders
        ]);
    }

    public function edit($id)
    {
        //
        $purchase_orders = PurchaseOrder::findOrFail($id);

        return view('pages.purchases.edit', compact('purchase_orders'));
    }

    public function update(Request $request, $id)
    {
        $purchase_order = PurchaseOrder::findOrFail($id);
        $purchases = $request->input('purchases');

        foreach ($purchase_order->purchases as $key=>$purchase) {
            $paid_amount = $purchases[$key]['amount'];
            if ($paid_amount != 0) {
                # create payment log each purchased item
                $payment_log = new PaymentLog([
                    'amount' => $paid_amount,
                ]);
                $purchase->payment_logs()->save($payment_log);
            }
        }
        // # additional action for print
        // if ($submit_value == 'simpan_cetak') {
        //     return response()->json($purchase_order);
        // }

        return redirect()->route('purchases.index');
    }

    public function destroy($id)
    {
        $item = PurchaseOrder::findorFail($id);
        
        // delete purchased items
        $item->purchases->each->delete();

        // delete purchase order
        $item->delete();

        return redirect()->route('purchases.index');
    }


    public function getNetto($bruto)
    {
        $data = Weight::where('bruto', $bruto)->first();
        return response()->json($data);
    }

    public function printPdf($id)
    {
        //
        $purchase_order = PurchaseOrder::findOrFail($id);
    	$pdf = PDF::loadview('pages.pdf.purchases_report', compact('purchase_order'));
    	return $pdf->stream();
    }

    public function export() 
    {
        return Excel::download(new PurchaseOrderExport, 'Nota Pembelian.xlsx');
    }

    public function exportharian() 
    {
        return Excel::download(new PurchaseOrderDailyExport, 'Laporan Harian - Pembelian.xlsx');
    }
}
