<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.pages.show_doctors', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->usertype != '1'){
            return redirect()->back();
        }

        return view('admin.pages.add_doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the Doctor creation form
        $validationArray = [
            'name' => 'required',
            'room' => 'required',
            'speciality' => 'required',
            'file' => 'required',
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
        $doctor->phone = $request->phone;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.pages.edit_doctor', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        
        // Validate the Doctor creation form
        $validationArray = [
            'name' => 'required',
            'room' => 'required',
            'speciality' => 'required',
            'phone' => 'required'
        ];
        $request->validate($validationArray);

        if($request->file){
            $image = $request->file;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('doctorimages', $imagename);    
            $doctor->image = $imagename; 
        }       

        $doctor->name = $request->name;        
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->phone = $request->phone;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->back()->with('message', 'A doctor removed successfully');
    }
}
