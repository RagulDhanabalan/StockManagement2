<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Carbon\Carbon;
use Session;

class ProductsController extends Controller
{
    // for create product routing
    public function create_products()
    {
        return view('Stock_Management.create-products-form');
    }
    // for inserting create products form details
    public function insert_products(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|regex:/^[A-Z A-z]+$/i|unique:products,name|max:30',
                'stock' => 'required|integer',
                'status' => 'required|string',
                'price' => 'required|integer',
                's_k_u' => 'required|string',
            ],
        );
        $validatedData = $request->all();
        $product = Product::create($validatedData);
        session::flash('message', 'New Product Created Successfully !');

        return redirect('/products');
        // return $request;
    }
    // for all products list table
    public function all_products()
    {
        $products = Product::with('entries')->orderBy('stock')->paginate(6);
        // Product::orderBy('stock', 'desc')->get();
        return view('Stock_Management.all-products-table', compact('products'));
    }
    // for edit each product ( form page )
    public function edit_product($id)
    {
        $product = Product::find($id);
        return view('Stock_Management.edit-product-form', ['product' => $product]);
    }
    // for update product value
    public function update_product(Request $request, $id)
    {
        $update_product = Product::find($id);
        $update_product->name = $request->input('name');
        $update_product->stock = $request->input('stock');
        $update_product->status = $request->input('status');
        $update_product->price = $request->input('price');
        $update_product->s_k_u = $request->input('s_k_u');

        $update_product->save();
        session::flash('update', 'Product Updated Successfully !');
        return redirect('/products');
    }
    // for view page of each product's all entries
    public function view_product_entries($id)
    {
        // $products = Product::with('entries')->find($id);
        // dd($products->entries->sum('value'));
        $startdate = '2023-08-01';
        $enddate = now();
        $products = Product::with('entries')->find($id);
        $result = $products->entries->whereBetween('date',[$startdate,$enddate]);
        $fq = $result->sum('quantity');
        $fv = $result->sum('value');
        $z = $products->entries;
        return view('Stock_Management.view-product-entries', compact('products', 'fq', 'fv'));
    }
    // csv file------------------------------------------------------------------------
// layout
    public function dashboard()
    {
        $product = Product::all();
        $customer = Customer::all();
        return view('Stock_Management.dashboard', ['product' => $product, 'customer' => $customer]);
    }

    // Entries of last one week

    public function one_week_entries($id, Request $request ){
        $products = Product::with('entries')->find($id);
        $startdate = $request->input('sdate');
        $enddate = $request->input('edate');
        $result = $products->entries->whereBetween('date',[$startdate,$enddate]);
        $fq = $result->sum('quantity');
        $fv = $result->sum('value');
        dd($fv);
        // return view('Stock_Management.oneweek', compact('products', 'fq', 'fv'));
    }

}
