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
        $reports = DB::table('sales_orders AS s')
            ->join('purchase_orders AS p', function ($join) {
                $join->on(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d')"), "=", DB::raw("DATE_FORMAT(p.created_at , '%Y-%m-%d')"));
            })
            ->select(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d') AS created_at"), 
                             DB::raw('SUM(s.amount) as total_sales'), 
                             DB::raw('SUM(p.amount) as total_purchases'), 
                             (DB::raw('SUM(s.amount)-SUM(p.amount) as total_laba_rugi')))
            ->groupBy(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d')"))
            ->get();
        return view('pages.reports.index', compact('reports'));
    }


    public function printPdf($tanggal)
    {
        //
        $reports = DB::table('sale_orders AS s')
            ->join('purchase_orders AS p', function ($join) {
                $join->on(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d')"), "=", DB::raw("DATE_FORMAT(p.created_at , '%Y-%m-%d')"));
            })
            ->select(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d') AS created_at"), 
                             's.tiam', 's.bruto', 
                             's.netto' , 's.warehouse_code', 
                             's.needle_code', 
                             'SUM(s.amount) as total_sales', 
                             'SUM(p.amount) as total_purchases', 
                             'SUM(s.amount)-SUM(p.amount) as total_laba_rugi')
            ->groupBy(DB::raw("DATE_FORMAT(s.created_at , '%Y-%m-%d')"))
            ->get();
    	$pdf = PDF::loadview('pages.pdf.pnl_report', compact('reports'));
    	return $pdf->stream();
    }
}
