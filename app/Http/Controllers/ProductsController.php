<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Carbon\Carbon;
use Session;
use PDF;

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
    public function all_products(Request $request)
    {

        $products = Product::with('entries')->orderBy('stock')->paginate(5);
        $entriesin = $products->entries('type', 'In');
        $entriesout = $products->entries('type', 'Out');
        $in = $entriesin->sum('quantity');
        $out = $entriesout->sum('quantity');
        return view('Stock_Management.all-products-table', ['products' => $products, 'in' => $in, 'out' => $out]);
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
    public function view_product_entries(Request $request, $id)
    {
        $products = Product::with('entries')->find($id);
        return view('Stock_Management.view-product-entries', compact('products'));
    }
    // csv file------------------------------------------------------------------------
// layout
    public function dashboard()
    {
        $product = Product::all();
        $customer = Customer::all();
        return view('Stock_Management.dashboard', ['product' => $product, 'customer' => $customer]);
    }

    public function form(Request $request)
    {
        $id = $request->input('id');
        $startDate = $request->input('sdate');
        $endDate = $request->input('edate');

        $pro = Product::all();
        $products = Product::with(
            [
                'entries' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('date', [$startDate, $endDate])->orderBy('date', 'asc');
                }
            ]
        )->find($id);

        // $products = Product::with('entries')->paginate(8);

        $sumIn = Product::with([
            'entries' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date', [$startDate, $endDate])
                    ->where('type', 'In');
            }
        ])->get();

        $totalQuantityIn = $sumIn->sum('quantity');

        $sumOut = Product::with([
            'entries' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date', [$startDate, $endDate])
                    ->where('type', 'Out');
            }
        ])->get();

        $totalQuantityOut = $sumOut->sum('quantity');

        return view('Stock_Management.inout', ['products' => $products, 'startDate' => $startDate, 'endDate' => $endDate, 'totalQuantityIn' => $totalQuantityIn, 'totalQuantityOut' => $totalQuantityOut, 'pro' => $pro]);
    }

    public function filter_data(Request $request)
    {
        $searchTerm = $request->input('search');
        $query = Product::query();

        if ($searchTerm) {
            $query->where('name', 'LIKE', "%$searchTerm%")
                ->orWhere('s_k_u', 'LIKE', "%$searchTerm%");
        }

        $products = $query->paginate(5);

        $message = $products->isEmpty() ? 'No products found.' : '';

        return view('Stock_Management.all-products-table', compact('products', 'searchTerm', 'message'));
    }

    public function pdf_products()
    {
        $products = Product::all();
        $options = new Options();
        $options->set('defualtFont', 'Arial');
        $dompdf = new Dompdf($options);
        $html = view('Stock_Management.all-products-table', compact('products'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();

        return $dompdf->stream('Products.pdf');

    }
    public function main()
    {
        $products = Product::with('entries')->orderBy('stock')->paginate(5);
        $entries = Entry::with('product')->paginate(5);
        $pie = Product::all();
        $piedata = Product::select('name', 'stock')->get();
        $data = $piedata->toArray();
        // $products = Product::select('name', 'stock')->get();
        $bar = $piedata->toArray();
        $in = 0;
        $out = 0;
        $product = Product::all();
        foreach ($products as $product) {
            $entriesin = $product->entries()->where('type', 'In')->get();
            $entriesout = $product->entries()->where('type', 'Out')->get();

            $in += $entriesin->sum('quantity');
            $out += $entriesout->sum('quantity');
        }

        return view('Stock_Management.main', ['products' => $products, 'product' => $product, 'data' => $data, 'pie' => $pie, 'piedata' => $piedata, 'bar' => $bar, 'entries' => $entries, 'in' => $in, 'out' => $out]);
    }
}