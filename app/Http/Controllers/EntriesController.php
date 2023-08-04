<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;

class EntriesController extends Controller
{
    // for create entry routing
    public function create_entries()
    {
        $products = Product::get();
        return view('Stock_Management.create-entries-form', ['products' => $products]);
    }
    public function insert_entries(Request $request)
    {
        $request->validate(
            [
                'product_id' => 'required',
                'type' => 'required',
                'quantity' => 'required',
                'value' => 'required',
                'description' => 'required',
                'date' => 'required',
            ],
        );

        // $data = Entry::create([
        //     'product_id' => $request->product_id,
        //     'type' => $request->type,
        //     'quantity' => $request->quantity,
        //     'value' => $request->value,
        //     'description' => $request->description,
        //     'date' => $request->date,
        //   ]);

        $entry = Entry::create($request->all());
        $product = Product::find($request->product_id);
        // dd($product->entries->toArray());
        if ($entry->type == 'In') {
            $product->stock = $product->stock + $request->quantity;
            $product->save();
        } else if ($entry->type == 'Out') {
            $product->stock = $product->stock - $request->quantity;
            $product->save();
        }

        return redirect('/entries')->with('message', 'New Entry created Successfully !');
    }


    // for all entries list table
    public function all_entries()
    {
        $entries = Entry::with('product')->paginate(6);
        return view('Stock_Management.all-entries-table', compact('entries'));
    }

}
