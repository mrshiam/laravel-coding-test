<?php

namespace App\Http\Controllers;
use App\Models\SaleReturn;

class SaleReturnController extends Controller
{
    public function index()
    {
        $saleReturns = SaleReturn::with([
            'customer:id,name',
            'saleReturnItems.product:id,name', 
            'saleReturnItems.saleReturnItemBarcodes:sale_return_item_id,barcode,quantity'
        ])->get(['id', 'customer_id', 'serial_number', 'date']);
    
        // Calculate total quantity for each sale return
        foreach ($saleReturns as $saleReturn) {
            $saleReturn->total_quantity = $saleReturn->saleReturnItems->sum(function ($item) {
                return $item->saleReturnItemBarcodes->sum('quantity');
            });
        }
    
        return view('admin.sale-returns.index', compact('saleReturns'));
    }
}
