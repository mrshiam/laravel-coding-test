<?php

namespace App\Http\Controllers;

class PurchaseController extends Controller
{
    public function index()
    {
        $records = collect();
        return view('admin.purchases.index', compact('records'));
    }
}
