<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $weight_data = Weight::all();
        return view('pages.weightdata.index', compact('weight_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.weightdata.create');
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
        $data = $request->input('weight');
        foreach ($data as $weight_data)
            $created_data = Weight::create($weight_data);

        // Weight::create($data);
        return redirect()->route('weightdata.index');
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
        $weight_data = Weight::findOrFail($id);

        return view('pages.weightdata.detail',[
            'weight_data' => $weight_data
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
        $weight_data = Weight::findOrFail($id);

        
        return view('pages.weightdata.edit',[
            'weight_data' => $weight_data
        ]);
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
        $data = $request->all();

        $item = Weight::findOrFail($id);

        $item->update($data);
        return redirect()->route('weightdata.index');


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
        $item = Weight::findorFail($id);
        $item->delete();

        return redirect()->route('weightdata.index');
    }

    public function print($id)
    {
        //

        $weight_data = Weight::findOrFail($id);

        return view('pages.weightdata.print',[
            'weight_data' => $weight_data
        ]);
    }
}
