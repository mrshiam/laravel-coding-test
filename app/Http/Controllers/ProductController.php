<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function index()
    {
        $records = collect();
        return view('admin.products.index', compact('records'));
    }
}
