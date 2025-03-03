<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItemBarcode extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_item_id', 'barcode', 'unit_price', 'quantity'];

    public function purchaseItem()
    {
        return $this->belongsTo(PurchaseItem::class);
    }
}
