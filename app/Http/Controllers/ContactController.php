<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('main.contact');
    }

    public function sendMessage(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'messages' => 'required|string',
        ]);


        // Send email
        Mail::to('long77872@gmail.com')->send(new ContactFormMail(
            $request->name,
            $request->surname,
            $request->email,
            $request->subject,
            $request->messages
        ));
        return back()->with('success', 'Your message has been sent!');
    }

    public function sendTestEmail()
    {
        Mail::to('long77872@gmail.com')->send(new ContactFormMail('John', 'Doe', 'john.doe@example.com', 'Test Subject', 'This is a test message.'));
        return 'Test email sent!';
    }

}
