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
        $paid_amount = $request->input('txtpaid');
        $purchases = $request->input('purchases');
        $purchased_at = $request->input('purchased_at');

        # create purchase_order
        $purchase_order = PurchaseOrder::create([
            'farmer_id' => $farmer_id,
            'purchased_at' => $purchased_at,
            'amount' => $amount,
        ]);

        # create payment logs
        $paymnet_log = new PaymentLog([
            'amount' => $paid_amount,
        ]);
        $purchase_order->payment_logs()->save($paymnet_log);

        # create purchase items
        foreach ($purchases as $purchase)
            $created_data = Purchase::create($purchase + ['purchase_order_id' => $purchase_order->id]);
        
        # additional action for print
        if ($submit_value == 'simpan_cetak') {
            return response()->json($purchase_order);
        }

        return redirect()->route('purchases.index');
    }

    public function show($id)
    {
        //
        $purchase = Purchase::findOrFail($id);

        return view('pages.purchases.detail',[
            'purchase' => $purchase
        ]);
    }

    public function edit($id)
    {
        //
        $purchases = Purchase::findOrFail($id);
        $farmers = Farmer::all();

        return view('pages.purchases.edit', compact('purchases','farmers'));
    }

    public function update(Request $request, $id)
    {
        //
        $submit_value = $request->input('submit_value');
        $farmer_data = $request->except('purchases', 'submit_value');
        $purchases = $request->input('purchases');

        // foreach ($purchases as $purchase)
        //     Purchase::update($farmer_data + $purchase);
        
        // $item = Purchase::findOrFail($id);

        $item->update($data);
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
}
