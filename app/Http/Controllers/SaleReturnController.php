<?php

namespace App\Http\Controllers;

class SaleReturnController extends Controller
{
    public function index()
    {
        $records = collect();
        return view('admin.sale-returns.index', compact('records'));
    }
}
