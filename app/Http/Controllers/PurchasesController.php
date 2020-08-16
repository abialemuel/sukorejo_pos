<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\PurchaseOrder;
use App\Farmer;
use App\Weight;
use PDF;
use Debugbar;


class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $purchases = Purchase::with(['farmer'])->get();

        return view('pages.purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $farmers = Farmer::all();

        return view('pages.purchases.create',compact('farmers'));
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
        $submit_value = $request->input('submit_value');
        $farmer_id = $request->input('farmer_id');
        $purchases = $request->input('purchases');
        $purchased_at = $request->input('purchased_at');

        # create purchase_order
        $purchase_order = PurchaseOrder::create([
            'farmer_id' => $farmer_id,
            'purchased_at' => $purchased_at,
        ]);

        # create purchase items
        foreach ($purchases as $purchase)
            $created_data = Purchase::create($purchase + ['purchase_order_id' => $purchase_order->id]);
        
        # additional action for print
        if ($submit_value == 'simpan_cetak') {
            return response()->json($created_data);
        }

        return redirect()->route('purchases.index');
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
        $purchase = Purchase::findOrFail($id);

        return view('pages.purchases.detail',[
            'purchase' => $purchase
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
        $purchases = Purchase::findOrFail($id);
        $farmers = Farmer::all();

        return view('pages.purchases.edit', compact('purchases','farmers'));
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
        $submit_value = $request->input('submit_value');
        $farmer_data = $request->except('purchases', 'submit_value');
        $purchases = $request->input('purchases');

        // foreach ($purchases as $purchase)
        //     Purchase::update($farmer_data + $purchase);
        
        // $item = Purchase::findOrFail($id);

        $item->update($data);
        return redirect()->route('purchases.index');
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
        $item = Purchase::findorFail($id);
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
    	$pdf = PDF::loadview('pages.pdf.test');
    	return $pdf->stream('test-pdf');
    }
}
