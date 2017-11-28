<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Car;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        return view('pages.customers.index');     
    }

    public function create()
    {
        return view('pages.customers.create');
    }

    public function store(Request $request)
    {   
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->street_address = $request->street_address;
        $customer->postal_code = $request->postal_code;
        $customer->primary_phone_number = $request->primary_phone_number;
        $customer->secondary_phone_number = $request->secondary_phone_number;

        $customer->save();
    }

    public function show($id)
    {   
        $customer = Customer::with('vehicle')->where('id', $id)->first();
        return response()->json(['customer'=>$customer]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if($customer)
        {
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->street_address = $request->street_address;
            $customer->postal_code = $request->postal_code;
            $customer->primary_phone_number = $request->primary_phone_number;
            $customer->secondary_phone_number = $request->secondary_phone_number;
            $customer->save();
        } 
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if($customer)
            $customer->delete();
    }

    //I like to have a method to handle Ajax calls and mound them on top of a blade file using a post.  Reason i want to disclose that is because not a lot of people like doing this :p. I always name this method as the resource class name
    public function customers()
    {
        $customers = Customer::all();
        return response()->json(['customers'=>$customers]);
    }

}
