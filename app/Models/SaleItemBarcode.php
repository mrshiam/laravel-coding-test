<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItemBarcode extends Model
{
    use HasFactory;

    protected $fillable = ['sale_item_id', 'barcode', 'unit_price', 'quantity'];

    public function saleItem()
    {
        return $this->belongsTo(SaleItem::class);
    }
}
