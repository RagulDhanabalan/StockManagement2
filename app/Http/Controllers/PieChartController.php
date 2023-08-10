<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;
class PieChartController extends Controller
{
    // for bar chart
    public function barchart_products()
    {
        $products = Product::select('name', 'stock')->get();
            $data = $products->toArray();
        return view('Stock_Management.bar_products',compact('data'));
    }

    // for pie chart
    public function piechart_products()
    {
        $products = Product::select('name', 'stock')->get();
            $data = $products->toArray();
        return view('Stock_Management.pie_products',compact('data'));
    }
     // for products graph
     public function graph_products()
     {
         $products = Product::select('name', 'stock')->get();
             $data = $products->toArray();
         return view('Stock_Management.graph_products',compact('data'));
     }
    public function barchart_entries()
    {
        $entries = Entry::select('description', 'date')->get();
            $data = $entries->toArray();
        return view('Stock_Management.pie_entries',compact('data'));
    }
}
