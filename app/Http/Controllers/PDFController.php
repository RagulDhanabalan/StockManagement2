<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;
use PDF;

class PDFController extends Controller
{
    public function pdf_entries()
    {
        $users = Entry::all();
        $csvFileName = 'Entry.PDF';

        // Generate PDF content
        $csvContent = "ID,Name,Value,Quantity,Type,Description,Date\n";
        foreach ($users as $user) {
            $csvContent .= "{$user->id},{$user->product->name},{$user->value},{$user->quantity},{$user->type},{$user->description},{$user->date}\n";
        }

        // Set headers for PDF download
        header("Content-Type: text/pdf");
        header("Content-Disposition: attachment; filename={$csvFileName}");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Output PDF content
        echo $csvContent;
        exit;
    }

    // pdf for products table-----------------------

    public function pdf_products()
    {
        $products = Product::all();
        
        // Generate PDF content
        $csvContent = "Product Id, Name, Stock, Status, Price, SKU \n";
        foreach ($products as $product) {
            $csvContent .= "{$product->id},{$product->name},{$product->stock},{$product->status},{$product->price},{$product->s_k_u} \n";
        }

        // Set headers for PDF download
        header("Content-Type: application/pdf");
        header("Content-Disposition: attachment; filename='Products.pdf'");

        // $result = readfile($cs);
        $result = fopen('Products.pdf', true);

        return $result;
    }

    public function generatePDF()
    {
        {
            // $data = [
            //     'title' => 'Sample PDF Title',
            //     'content' => 'This is the content of the PDF.',
            // ];

            // $pdf = PDF::loadView('pdf_template', $data);
                $pdf = Product::all();
            return $pdf->download('sample.pdf');
        }
    }
}




