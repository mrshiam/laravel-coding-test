<?php

namespace App\Http\Controllers;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index()
    {
        
        $sales = Sale::with([
            'customer:id,name',
            'saleItems.product:id,name', 
            'saleItems.saleItemBarcodes:sale_item_id,barcode,quantity'
        ])->get(['id', 'customer_id', 'serial_number', 'date']);

        
        foreach ($sales as $sale) {
            $sale->total_quantity = $sale->saleItems->sum(function ($item) {
                return $item->saleItemBarcodes->sum('quantity');
            });
        }
        return view('admin.sales.index', compact('sales'));
    }
}
