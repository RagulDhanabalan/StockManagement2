<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function register_form()
    {
        return view('Stock_Management.register-form');
    }
    public function register_insert(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|regex:/^[A-Z A-z]+$/i|unique:products,name|max:30',
            'email' => 'required',
        ]);
        $data = $request->all();
        Customer::create($data);
        session::flash('message', 'New Customer Created Successfully !');

        return redirect('/welcome-customer');
    }
    public function welcome_customer(){
        $customers = Customer::paginate(5);
        return view('Stock_Management.WelcomeCustomer', ['customers' => $customers]);
    }

    // log in--------------------------------------------------------------------------

    public function login_form()
    {
        return view('Stock_Management.login-form');
    }
    public function authenticate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');

        if(Auth::attempt(['name' => $name, 'email' => $email])){
            $customer = Customer::where('name',$name)->first();
            Auth::login($customer);
            return redirect('/welcome-customer');
        }
        else{
            return back()->withErrors('Invalid data given');
        }

    }

    public function dashboard_customer(){
        $customers = Customer::paginate(5);
        return view('Stock_Management.WelcomeCustomer', ['customers' => $customers]);
    }
}
