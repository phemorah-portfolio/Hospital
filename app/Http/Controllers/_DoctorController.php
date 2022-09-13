<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function addView() {
        if(Auth::user()->usertype != '1'){
            return redirect()->back();
        }

        return view('admin.pages.add_doctor');
    }

    public function addDoctor(Request $request) {
        // Validate the Doctor creation form
        $validationArray = [
            'name' => 'required',
            'room' => 'required',
            'speciality' => 'required',
            'image' => 'required',
            'phone' => 'required'
        ];
        $request->validate($validationArray);

        $doctor = new Doctor;

        $image = $request->file;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('doctorimages', $imagename);

        $doctor->image = $imagename;
        $doctor->name = $request->name;        
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->phone = $request->name;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully');
    }

    public function doctors() {
        $doctors = Doctor::all();
        return view('admin.pages.show_doctors', compact('doctors'));
    }


    public function updateDoctor(Doctor $doctor) {
        dd($doctor);
    }

    public function deleteDoctor(Doctor $doctor) {
        dd($doctor);
    }


}
