<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'mobile'];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchasesReturn()
    {
        return $this->hasMany(PurchaseReturn::class);
    }
}
