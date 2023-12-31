<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SaleItemBarcode;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run()
    {
        $customers = Customer::get();
        $products = Product::get();

        for ($i = 0; $i < 10; $i++) {
            $lastSerialNumber = ($lastItem = Sale::latest('id')->first()) ? $lastItem->serial_number : 0;
            $data = Sale::create([
                'customer_id' => $customers[$i % 5]->id,
                'date' => fake()->dateTimeBetween('-2 years'),
                'serial_number' => str_pad(($lastSerialNumber + 1), 10, '0', STR_PAD_LEFT),
            ]);
            foreach ($products->skip($i % $products->count())->take(5) as $product) {
                $item = SaleItem::create([
                    'sale_id' => $data->id,
                    'product_id' => $product->id,
                ]);

                for ($j = 0; $j < $i % 5 + 1; $j++) {
                    SaleItemBarcode::create([
                        'sale_item_id' => $item->id,
                        'barcode' => str_pad($item->id . $j, 13, '0', STR_PAD_LEFT),
                        'unit_price' => $product->sale_price,
                        'quantity' => $i + 1 % 5 + $j,
                    ]);
                }
            }
        }
    }
}
