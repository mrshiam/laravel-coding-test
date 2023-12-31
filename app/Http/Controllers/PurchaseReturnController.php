<?php

namespace App\Http\Controllers;

class PurchaseReturnController extends Controller
{
    public function index()
    {
        $records = collect();
        return view('admin.purchase-returns.index', compact('records'));
    }
}
