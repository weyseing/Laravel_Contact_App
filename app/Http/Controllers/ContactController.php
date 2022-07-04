<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// =============================
// import
// =============================
use App\Models\Contact;             //Contact model namespace
use App\Models\Company;             //Contact model namespace

class ContactController extends Controller
{
    // ============================
    // index - show all contacts
    // ============================
    public function index(Type $var = null) 
    {
        $companies = Company::orderBy('name')->pluck("name", "id")->prepend("All Companies", "");               //get all companies from DB for dropdown list
        $contacts = Contact::orderBy('first_name', 'asc')->where(function($query){                              //get all contacts from DB based on pagination
            if ($companyId = request('company_id')) {                                                           //and company ID from url parameter
                $query->where('company_id', $companyId);
            }
        })->paginate(10);                                       
        return view('contacts.index', compact('contacts', 'companies'));
    }

    // ============================
    // create - add new contact
    // ============================
    public function create(Type $var = null)
    {
        $companies = Company::orderBy('name')->pluck("name", "id");               //get all companies from DB for dropdown list 
        return view('contacts.create', compact('companies'));
    }

    // ============================
    // store - add new contact
    // ============================
    public function store(Request $request)
    {
        
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
