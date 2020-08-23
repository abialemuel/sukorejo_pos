<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentLog;
use App\Sale;
use App\SalesOrder;
use App\Weight;
use PDF;

class SalesController extends Controller
{

    public function index()
    {
        //
        $sales_orders = SalesOrder::all();
        return view('pages.sales.index', compact('sales_orders'));
    }

    public function create()
    {
        //
        return view('pages.sales.create');

    }

    public function store(Request $request)
    {
        //
        $submit_value = $request->input('submit_value');
        $warehouse_code = $request->input('warehouse_code');
        $needle_code = $request->input('needle_code');
        $amount = $request->input('txttotal');
        $paid_amount = $request->input('txtpaid');
        $sales = $request->input('sales');
        $sold_at = $request->input('sold_at');

        # create sales_order
        $sales_order = SalesOrder::create([
            'warehouse_code' => $warehouse_code,
            'needle_code' => $needle_code,
            'sold_at' => $sold_at,
            'amount' => $amount,
        ]);

        # create payment logs
        $paymnet_log = new PaymentLog([
            'amount' => $paid_amount,
        ]);
        $sales_order->payment_logs()->save($paymnet_log);

        # create sold items
        foreach ($sales as $sale)
            Sale::create($sale + ['sales_order_id' => $sales_order->id]);

        # additional action for print
        if ($submit_value == 'simpan_cetak') {
            return response()->json($sales_order);
        }

        return redirect()->route('sales.index');
    }

    public function show($id)
    {
        //
        $sale_orders = SalesOrder::findOrFail($id);
        return view('pages.sales.detail',[
            'sale_orders' => $sale_orders
        ]);
        
    }

    public function edit($id)
    {
        //
        $sale_orders = SalesOrder::findOrFail($id);

        return view('pages.sales.edit', compact('sale_orders'));        
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
        $item = SalesOrder::findorFail($id);

        // delete sold items
        $item->sales->each->delete();
        
        // delete sales order
        $item->delete();

        return redirect()->route('sales.index');
    }

    public function printPdf($id)
    {
        //
        $sales_order = SalesOrder::findOrFail($id);
    	$pdf = PDF::loadview('pages.pdf.sales_report', compact('sales_order'));
    	return $pdf->stream();
    }

    public function getNetto($bruto)
    {
        $data = Weight::where('bruto', $bruto)->first();
        return response()->json($data);
    }
}
