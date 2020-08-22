<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SalesOrder;
use App\Weight;
use PDF;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sales_orders = SalesOrder::all();
        return view('pages.sales.index', compact('sales_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.sales.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sold_at = $request->except('sales','txttotal','txtpaid','txtdue');
        $sales = $request->input('sales');

        foreach ($sales as $sale)
            SalesOrder::create($sold_at + $sale);
        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $sale = SalesOrder::findOrFail($id);
        return view('pages.sales.detail',[
            'sale' => $sale
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sale = SalesOrder::findOrFail($id);

        return view('pages.sales.edit', compact('sale'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = SalesOrder::findorFail($id);
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
