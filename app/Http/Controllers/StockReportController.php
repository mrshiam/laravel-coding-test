<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class StockReportController extends Controller
{
    public function index()
    {
        $products = DB::select("
        SELECT 
            p.id AS product_id,
            p.name AS product_name,

            COALESCE(SUM(pi_barcodes.quantity), 0) AS total_purchased_quantity,
            COALESCE(SUM(pri_barcodes.quantity), 0) AS total_purchase_returned_quantity,
            COALESCE(SUM(si_barcodes.quantity), 0) AS total_sold_quantity,
            COALESCE(SUM(sri_barcodes.quantity), 0) AS total_sale_returned_quantity,

            (COALESCE(SUM(pi_barcodes.quantity), 0) 
            - COALESCE(SUM(pri_barcodes.quantity), 0) 
            - COALESCE(SUM(si_barcodes.quantity), 0) 
            + COALESCE(SUM(sri_barcodes.quantity), 0)) AS stock_quantity

        FROM products p

        LEFT JOIN purchase_items pi ON p.id = pi.product_id
        LEFT JOIN purchase_item_barcodes pi_barcodes ON pi.id = pi_barcodes.purchase_item_id

        LEFT JOIN purchase_return_items pri ON p.id = pri.product_id
        LEFT JOIN purchase_return_item_barcodes pri_barcodes ON pri.id = pri_barcodes.purchase_return_item_id

        LEFT JOIN sale_items si ON p.id = si.product_id
        LEFT JOIN sale_item_barcodes si_barcodes ON si.id = si_barcodes.sale_item_id

        LEFT JOIN sale_return_items sri ON p.id = sri.product_id
        LEFT JOIN sale_return_item_barcodes sri_barcodes ON sri.id = sri_barcodes.sale_return_item_id

        GROUP BY p.id, p.name
    ");
        return view('admin.stocks.index', compact('products'));
    }
}
