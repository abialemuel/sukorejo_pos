<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $sold_at = $request->except('sales','txttotal','txtpaid','txtdue');
        $sales = $request->input('sales');

        foreach ($sales as $sale)
            SalesOrder::create($sold_at + $sale);
        return redirect()->route('sales.index');
    }

    public function show($id)
    {
        //
        $sale = SalesOrder::findOrFail($id);
        return view('pages.sales.detail',[
            'sale' => $sale
        ]);
        
    }

    public function edit($id)
    {
        //
        $sale = SalesOrder::findOrFail($id);

        return view('pages.sales.edit', compact('sale'));        
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
