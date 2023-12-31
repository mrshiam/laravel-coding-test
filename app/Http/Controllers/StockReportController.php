<?php

namespace App\Http\Controllers;

class StockReportController extends Controller
{
    public function index()
    {
        $records = collect();
        return view('admin.stocks.index', compact('records'));
    }
}
