<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Farmer;
use App\Weight;
use PDF;


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
        $farmer_data = $request->except('purchases', 'submit_value');
        $purchases = $request->input('purchases');

        foreach ($purchases as $purchase)
            Purchase::create($farmer_data + $purchase);
        
        # additional action for print
        if ($submit_value == 'simpan_cetak') {
            $pdf = PDF::loadview('pages.pdf.test');
            return $pdf->stream('test-pdf');
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
        $purchase = Purchase::findOrFail($id);

        return view('pages.purchases.edit', compact('purchase'));
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
        $item = Purchase::findorFail($id);
        $item->delete();

        return redirect()->route('purchases.index');
    }


    public function getNetto($bruto)
    {
        $data = Weight::where('bruto', $bruto)->first();
        return response()->json($data);
    }

    public function print_pdf($id)
    {
        //
    	$pdf = PDF::loadview('pages.pdf.test');
    	return $pdf->stream('test-pdf');
    }
}
