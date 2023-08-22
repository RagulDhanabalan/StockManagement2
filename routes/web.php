<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stock_Management;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PieChartController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// -----------------------------------------------------------------------
Route::get('/', function () {
    return view('Stock_Management.index');
});
// route for the index page
Route::get('/index', function () {
    return view('Stock_Management.index');
});

// ------------------------------------------------------------------------

//route for all-products list table
Route::get('/products',[ProductsController::class, 'all_products']);
Route::get('/products',[ProductsController::class, 'filter_data']);
Route::get('/filter-entries',[EntriesController::class, 'filter_data_entries']);
Route::post('/products',[ProductsController::class, 'all_products']);
//route for all-entries list table
Route::get('/entries',[EntriesController::class, 'all_entries']);
//route for create products form
Route::get('/products/create',[ProductsController::class, 'create_products']);
//route for inserting data to database using create products form
Route::post('/insert-products',[ProductsController::class, 'insert_products']);
//route for create entries form
Route::get('/entries/create',[EntriesController::class, 'create_entries']);
//route for inserting data to database using create entries form
Route::post('/insert-entries',[EntriesController::class, 'insert_entries']);
//route for view page of all unique product entries
Route::get('products/{id}/view-entries/',[ProductsController::class, 'view_product_entries']);
// Route::post('products/{id}/view-entries/',[ProductsController::class, 'view_product_entries']);
// Route::post('products/{id}/view-entries/',[ProductsController::class, 'form']);
Route::post('/week-entries',[ProductsController::class, 'one_week_entries']);
// for edit product ( form )
Route::get('products/{id}/edit/',[ProductsController::class,'edit_product']);
// for updating product details
Route::post('products/{id}/update',[ProductsController::class,'update_product']);

// for  CSV file generation
Route::get('/import-csv',[CSVController::class,'importCSV']);
Route::get('/export-csv-entry',[CSVController::class,'exportCSV_entry']);
Route::get('/export-csv-product',[CSVController::class,'exportCSV_product']);
// for  PDF file generation
Route::get('/pdf-products',[PDFController::class,'pdf_products']);
Route::get('/pdf-entries',[PDFController::class,'pdf_entries']);

// pie chart route
Route::get('/pie-chart-products', [PieChartController::class, 'piechart_products']);
// bar chart route
Route::get('/bar-chart-products', [PieChartController::class, 'barchart_products']);
// products graph route
Route::get('/graph-products', [PieChartController::class, 'graph_products']);

// ----------------Dashboard----------------------------------
Route::get('/dashboard', [ProductsController::class, 'dashboard']);
// --------------------------------------------------



// register routes
Route::get('register-form', [LoginController::class, 'register_form']);
Route::post('register-insert', [LoginController::class, 'register_insert']);
Route::get('welcome-customer', [LoginController::class, 'welcome_customer']);

// login routes

Route::get('login-form', [LoginController::class, 'login_form']);
Route::post('authenticate', [LoginController::class, 'authenticate']);
Route::get('welcome-customer', [LoginController::class, 'welcome_customer']);

// Route::get('layout','Stock_Management.layout');


// Entries details routes
Route::post('/in-out', [ProductsController::class, 'form']);

