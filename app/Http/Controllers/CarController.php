<?php

namespace App\Http\Controllers;
use App\Car;
use App\Type;
use App\Customer;
use Illuminate\Http\Request;

class CarsController extends Controller
{

    public function index()
    {
        return view('pages.vehicles.index');
    }

    public function create()
    {
        return view('pages.vehicles.create');
    }

    public function store(Request $request)
    {
        $vehicle = new Car();
        $vehicle->make = $request->make;
        $vehicle->year = $request->year;
        $vehicle->engine = $request->engine;
        $vehicle->color = $request->color;
        $vehicle->type_id = $request->type_id;
        $vehicle->type_id = $request->model;
        $vehicle->customer_id = $request->customer_id;
        $vehicle->odometer_meter = $request->odometer_meter;

        $vehicle->save();
    }

    public function show($id)
    {
        $vehicle = Car::find($id);
        $customer = Customer::where('id', $vehicle->customer_id)->first();
        
        return response()->json(['vehicle'=>$vehicle,
                                'customer'=>$customer]);
    }


    public function update(Request $request, $id)
    {
        $vehicle = Car::find($id);
        if($vehicle)
        {
            $vehicle->make = $request->make;
            $vehicle->year = $request->year;
            $vehicle->engine = $request->engine;
            $vehicle->color = $request->color;
            $vehicle->type_id = $request->type_id;
            $vehicle->type_id = $request->model;
            $vehicle->odometer_meter = $request->odometer_meter;

            $vehicle->save();
        }
    }

    public function destroy($id)
    {
        $vehicle = Car::find($id);
        if($vehicle)
            $vehicle->delete();
    }

    public function vehicles()
    {
        $vehicles = Car::all();
        $types = type::all();
        $customers = Customer::all();

        return response()->json(['vehicles'=>$vehicles,
                                'customers'=>$customers,
                                    'types'=>$types,]);
    }

    public function vehiclesByCustomer($id)
    {
        $vehicles = Car::where('customer_id', $id)->get();
        return response()->json(['vehicles'=>$vehicles]);
    }
}
