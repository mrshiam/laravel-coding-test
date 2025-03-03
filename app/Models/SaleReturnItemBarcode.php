<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturnItemBarcode extends Model
{
    use HasFactory;

    protected $fillable = ['sale_return_item_id', 'barcode', 'unit_price', 'quantity'];

    public function saleReturnItem()
    {
        return $this->belongsTo(SaleReturnItem::class);
    }
}
