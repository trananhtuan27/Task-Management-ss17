<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('list', compact('customers'));
    }

    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->bob = $request->bob;
        $customer->email = $request->email;

        $customer->save();

        return redirect()->route('customers.index');
    }
    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('edit', compact('customer'));
    }
    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $customer->name     = $request->name;
        $customer->bob      = $request->bob;
        $customer->email    = $request->email;

        $customer->save();
        return redirect()->route('customers.index');
    }
    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
