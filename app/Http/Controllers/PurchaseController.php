<?php

namespace App\Http\Controllers;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with([
            'supplier:id,name',
            'purchaseItems.purchaseItemBarcodes:purchase_item_id,barcode,quantity',
            'purchaseItems.product:id,name'  
        ])
        ->get(['id', 'supplier_id', 'serial_number', 'date']);
        
        foreach ($purchases as $purchase) {
            $purchase->total_quantity = $purchase->purchaseItems->sum(function ($item) {
                return $item->purchaseItemBarcodes->sum('quantity');
            });
        }

        return view('admin.purchases.index', compact('purchases'));
    }

}
