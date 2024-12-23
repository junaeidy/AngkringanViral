<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function processContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string|max:10000',
        ]);
    
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        Alert::success('Pesan anda telah terkirim.', 'Pesan berhasil dikirim.');
        return redirect()->route('contact');
    }

    public function adminIndex()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', ['contacts' => $contacts]);
    }
}
