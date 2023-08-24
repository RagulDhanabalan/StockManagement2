<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;
use Carbon\Carbon;

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
                'description' => 'required',
                'date' => 'required',
            ],
        );

        // $entry = Entry::create($request->all());
        $product = Product::find($request->product_id);
        // $entry->value = $product->price * $entry->quantity;
        // dd($product->entries->toArray());
        if ($request->type == 'In') {
            $product->stock = $product->stock + $request->quantity;
            $product->save();
        } else if ($request->type == 'Out') {
            $product->stock = $product->stock - $request->quantity;
            $product->save();
        }
        $value = $product->price * $request->quantity;

        $entry = Entry::create([
            'product_id' => $request->product_id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'date' => $request->date,
            'value' => $value,
        ]);

        return redirect('/entries')->with('message', 'New Entry created Successfully !');
    }

    // for all entries list table
    public function all_entries()
    {
        $entries = Entry::with('product')->paginate(6);
        return view('Stock_Management.all-entries-table', compact('entries'));
    }
    public function filter_data_entries(Request $request)
    {
        $searchTerm = $request->input('search');
        $query = Entry::query();

        if ($searchTerm) {
            $query->where('id', 'LIKE', "%$searchTerm%")
                ->orWhere('product_id', 'LIKE', "%$searchTerm%");
        }

        $entries = $query->paginate(5);

        $message = $entries->isEmpty() ? 'No Entries Found.' : '';

        return view('Stock_Management.all-entries-table', compact('entries', 'searchTerm', 'message'));
    }

}