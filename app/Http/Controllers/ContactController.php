<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "full_name" => 'required|string|min:3|max:255',
            "email" => 'required|string|email',
            "phone_number" => 'required|numeric|digits_between:5,15',
        ]);

        $newContact = new Contact();
        $newContact -> full_name = $validated['full_name'];
        $newContact -> email = $validated['email'];
        $newContact -> phone_number = $validated['phone_number'];

        $newContact -> save();

        return redirect('/contact')->with('success', 'Terima kasih, kami akan segera menghubungi Anda!');
    }
}
