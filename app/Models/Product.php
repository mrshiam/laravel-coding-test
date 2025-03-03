<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'purchase_price', 'sale_price', 'image'];

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function purchaseReturnItems()
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function salesReturn()
    {
        return $this->hasMany(SaleReturn::class);
    }

}
