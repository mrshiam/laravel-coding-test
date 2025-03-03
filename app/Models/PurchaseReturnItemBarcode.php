<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturnItemBarcode extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_return_item_id', 'barcode', 'unit_price', 'quantity'];

    public function purchaseReturnItem()
    {
        return $this->belongsTo(PurchaseReturnItem::class);
    }
}
