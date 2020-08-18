<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Purchase;
use PDF;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index()
    {
        $reports = DB::table('sales AS s')
            ->join('purchases AS p', function ($join) {
                $join->on(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d')"), "=", DB::raw("DATE_FORMAT(p.created_at , '%Y-%m-%d')"));
            })
            ->select(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d') AS created_at"), 
                             's.tiam', 's.bruto', 
                             's.netto' , 's.warehouse_code', 
                             's.needle_code', 
                             DB::raw('SUM(s.price) as total_sales'), 
                             DB::raw('SUM(p.price) as total_purchases'), 
                             (DB::raw('SUM(s.price)-SUM(p.price) as total_laba_rugi')))
            ->groupBy(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d')"), 's.tiam', 's.bruto', 's.netto', 's.warehouse_code', 's.needle_code')
            ->get();
        return view('pages.reports.index', compact('reports'));
    }

    // dummy data
    public function print_pdf($tanggal)
    {
        //
    	$pdf = PDF::loadview('pages.pdf.test');
    	return $pdf->stream('test-pdf');
    }
}
