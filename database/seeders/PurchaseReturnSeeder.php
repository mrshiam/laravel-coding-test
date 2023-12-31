<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnItem;
use App\Models\PurchaseReturnItemBarcode;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class PurchaseReturnSeeder extends Seeder
{
    public function run()
    {
        $suppliers = Supplier::get();
        $products = Product::get();

        for ($i = 0; $i < 5; $i++) {
            $lastSerialNumber = ($lastItem = PurchaseReturn::latest('id')->first()) ? $lastItem->serial_number : 0;
            $data = PurchaseReturn::create([
                'supplier_id' => $suppliers[$i % 5]->id,
                'date' => fake()->dateTimeBetween('-2 years'),
                'serial_number' => str_pad(($lastSerialNumber + 1), 10, '0', STR_PAD_LEFT),
            ]);
            foreach ($products->skip($i % $products->count())->take(5) as $product) {
                $item = PurchaseReturnItem::create([
                    'purchase_return_id' => $data->id,
                    'product_id' => $product->id,
                ]);

                for ($j = 0; $j < $i % 5 + 1; $j++) {
                    PurchaseReturnItemBarcode::create([
                        'purchase_return_item_id' => $item->id,
                        'barcode' => str_pad($item->id . $j, 13, '0', STR_PAD_LEFT),
                        'unit_price' => $product->sale_price,
                        'quantity' => $i + 1 % 5 + $j,
                    ]);
                }
            }
        }
    }
}
