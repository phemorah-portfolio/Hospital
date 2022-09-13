<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class AppointmentController extends Controller
{
     public function makeAppointment(Request $request) {
        // Validate the Appointment creation form
        $validationArray = [
            'doctor_id' => 'required',
            'date' => 'required',
            'message' => 'required'
        ];

        if(!Auth::id()){
           array_push($validationArray, [
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required'
            ]);
        }

        $request->validate($validationArray);

        $appointment = new Appointment;

        $appointment->name = (Auth::id()) ? Auth::user()->name : $request->name;
        $appointment->email = (Auth::id()) ? Auth::user()->email : $request->email;
        $appointment->phone = (Auth::id()) ? Auth::user()->phone : $request->phone;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date = $request->date;
        $appointment->message = $request->message;
        $appointment->status = 'In progress';

        $appointment->user_id = (Auth::id()) ? Auth::user()->id : 0;

        $appointment->save();

        return redirect()->back()->with('message', 'Thank you for booking an appointment with one of our doctors. We will keep in touch with you soon.');
    }


    public function myAppointments() {
        $myappointments = Appointment::with('doctor')->where('user_id', Auth::user()->id)->get();        
        return view('user.myappointments', compact('myappointments'));
    }


    public function cancelAppoint($id) {
        $appoint = Appointment::find($id);

        $appoint->delete();

        return redirect()->route('myappointments');
    }


    public function appoints() {
        
        $appointments = Appointment::with('doctor')->get();

        return view('admin.pages.show_appointments', compact('appointments'));
    }

    public function approve($id) {
        $appointment = Appointment::find($id);
        $appointment->status = 'approved';
        $appointment->save();

        return redirect()->back();
    }
}
