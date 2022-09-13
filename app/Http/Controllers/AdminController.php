<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Notification;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function mailForm($id) {        
        // dd($request->all())
        return view('admin.pages.email_form', compact('id'));
    }

    public function sendMail(Request $request) {
        $appointment = Appointment::find($request->appoint_id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_part' => $request->end_part
        ];

        Notification::send($appointment, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email succesfully delivered to');
    }
}
