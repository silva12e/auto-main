<?php

namespace App\Http\Controllers;
use App\Appointment;
use App\Car;
use App\Service;
use App\Type;
use Illuminate\Http\Request;


class AppointmentsController extends Controller
{

    public function index()
    {   
        return view('pages.appointments.dashboard');
    }

    public function appointments()
    {
        $appointments = Appointment::with('customer', 'service')->get();
        return view('pages.appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('pages.appointments.create');
    }

    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->vehicle_id = $request->vehicle_id;
        $appointment->service_id = $request->service_id;
        $appointment->customer_id = $request->customer_id;
        $appointment->date = $request->date;
        $appointment->time= $request->time;

        $appointment->save();
    }

    public function show($id)
    {
        $appointment = Appointment::with('customer','vehicle','service')->where('id', $id)->first();
        return response()->json(['appointment'=>$appointment]);
    }

    public function update(Request $request, $id)
    {
        $appointment = Service::find($id);
        $appointment->vehicle_id = $request->vehicle_id;
        $appointment->service_id = $request->service_id;
        $appointment->date= $request->date;
        $appointment->time= $request->time;

        $appointment->save();
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if($appointment)
            $appointment->delete();
    }

    public function booked()
    {
        $appointments = Appointment::with('service')->get();
        $services = Service::All();
        return response()->json(['appointments'=>$appointments, 'services'=>$services]);
    }
    
}
