<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;

class CSVController extends Controller
{
    public function exportCSV_entry()
    {
        $users = Entry::all();
        $csvFileName = 'Entry.csv';

        // Generate CSV content
        $csvContent = "ID,Name,Value,Quantity,Type,Description,Date\n";
        foreach ($users as $user) {
            $csvContent .= "{$user->id},{$user->product->name},{$user->value},{$user->quantity},{$user->type},{$user->description},{$user->date}\n";
        }

        // Set headers for CSV download
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$csvFileName}");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Output CSV content
        echo $csvContent;
        exit;
    }
    // csv export for products table-----------------------

    public function exportCSV_product()
    {
        $products = Product::all();
        $csvFileName = 'Products.csv';

        // Generate CSV content
        $csvContent = "Product Id, Name, Stock, Status, Price, SKU \n";
        foreach ($products as $product) {
            $csvContent .= "{$product->id},{$product->name},{$product->stock},{$product->status},{$product->price},{$product->s_k_u} \n";
        }

        // Set headers for CSV download
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$csvFileName}");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Output CSV content
        echo $csvContent;
        exit;
    }
}
