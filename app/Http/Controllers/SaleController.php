<?php

namespace App\Http\Controllers;

class SaleController extends Controller
{
    public function index()
    {
        $records = collect();
        return view('admin.sales.index', compact('records'));
    }
}
