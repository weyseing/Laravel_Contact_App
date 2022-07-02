<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// =============================
// import
// =============================
use App\Models\Contact;             //Contact model namespace

class ContactController extends Controller
{
    // ============================
    // index - show all contacts
    // ============================
    public function index(Type $var = null)
    {
        $contacts = Contact::orderBy('first_name', 'asc')->paginate(10);                                        //get all contacts from DB
        return view('contacts.index', compact('contacts'));
    }

    // ============================
    // create - add new contact
    // ============================
    public function create(Type $var = null)
    {
        return view('contacts.create');
    }

    // ============================
    // show - display specific contact by ID
    // ============================
    public function show($id)
    {
        $contact = Contact::find($id);                                      //get contact details from DB
        return view('contacts.show', compact('contact'));                   //return contact variable to view
    }
}
