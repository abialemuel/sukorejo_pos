<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;
use Validator;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $farmers = Farmer::all();
        return view('pages.farmers.index', compact('farmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.farmers.create');

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
        $data = $request->all();

        $validator = Validator::make($data, [
            'farmer_code' => 'required|unique:farmers|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->route('farmers.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Farmer::create($data);
        return redirect()->route('farmers.index');
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
        $farmers = Farmer::findOrFail($id);

        return view('pages.farmers.edit',[
            'farmers' => $farmers
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

        $item = Farmer::findOrFail($id);
        $item->update($data);
        return redirect()->route('farmers.index');
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
        $item = Farmer::findorFail($id);
        $item->delete();

        return redirect()->route('farmers.index');
    }
}
