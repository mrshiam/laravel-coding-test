<?php

namespace App\Http\Controllers;
use App\Models\PurchaseReturn;

class PurchaseReturnController extends Controller
{
    public function index()
    {
        $purchaseReturns = PurchaseReturn::with([
            'supplier:id,name',
            'purchaseReturnItems.product:id,name', 
            'purchaseReturnItems.purchaseReturnItemBarcodes:purchase_return_item_id,barcode,quantity'
        ])->get(['id', 'supplier_id', 'serial_number', 'date']);
    
        
        foreach ($purchaseReturns as $return) {
            $return->total_quantity = $return->purchaseReturnItems->sum(function ($item) {
                return $item->purchaseReturnItemBarcodes->sum('quantity');
            });
        }
    
        return view('admin.purchase-returns.index', compact('purchaseReturns'));
    }
}
