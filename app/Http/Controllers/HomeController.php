<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function redirect() {
        if(Auth::id()) {
            if(Auth::user()->usertype == '0'){
                $doctors = Doctor::all();
                return view('index', compact('doctors'));
            }
            else{
                return view('admin.pages.home');
            }
        }
        else {
            return redirect()->back();
        }
    }

    public function index() {
        $doctors = Doctor::all();
        return view('index', compact('doctors'));
    }
}
