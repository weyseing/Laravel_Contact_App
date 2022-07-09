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
        
        $contacts = Contact::orderBy('id', 'desc')->where(function($query){                                     //get all contacts from DB based on pagination    
            // if got COMPANY ID in url parameter, get based on company ID from url parameter
            if ($companyId = request('company_id')) {                                                           
                $query->where('company_id', $companyId);
            }

            // if got SEARCH keyword in url parameter, get based contact based on search keyword
            if ($search = request('search')) {
                $query->where('first_name', 'LIKE', "%{$search}%");
            }
        })->paginate(10);   
                                            
        return view('contacts.index', compact('contacts', 'companies'));
    }

    // ============================
    // create - add new contact
    // ============================
    public function create(Type $var = null)
    {
        $contact = new Contact();
        $companies = Company::orderBy('name')->pluck("name", "id");             //get all companies from DB for dropdown list 
        return view('contacts.create', compact('companies', 'contact'));
    }

    // ============================
    // store - add new contact
    // ============================
    public function store(Request $request)                                                                                 //'$request' is to get the form POST data
    {
        $request->validate([                                                                                                //form validation, to check column below
            'first_name' => 'required',                                                                                     //required data
            'last_name' => 'required',                                                                                      //required data
            'email' => 'required|email',                                                                                    //required data & email format check
            'address' => 'required',                                                                                        //required data
            'company_id' => 'required|exists:companies,id',                                                                 //required data & check if "id" exists in "companies" DB table
        ]);

        Contact::create($request->all());                                                                                   //save data to database, must have "protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];" in Model
        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');                 //return to link with success msg

        //dd($request->all());                                                                                              //Dump and Die to display data and stop script
    }

    // ============================
    // show - display specific contact by ID
    // ============================
    public function show($id)
    {
        $contact = Contact::findOrFail($id);                                      //get contact details from DB
        return view('contacts.show', compact('contact'));                   //return contact variable to view
    }

    // ============================
    // edit specific contact by ID
    // ============================
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);                                    //get contact from DB based on ID OR fail
        $companies = Company::orderBy('name')->pluck("name", "id");             //get all companies from DB for dropdown list 
        return view('contacts.edit', compact('companies', 'contact'));
    }

    // ============================
    // update specific contact by ID
    // ============================
    public function update($id, Request $request)                                                                           //'$request' is to get the form POST data
    {
        $request->validate([                                                                                                //form validation, to check column below
            'first_name' => 'required',                                                                                     //required data
            'last_name' => 'required',                                                                                      //required data
            'email' => 'required|email',                                                                                    //required data & email format check
            'address' => 'required',                                                                                        //required data
            'company_id' => 'required|exists:companies,id',                                                                 //required data & check if "id" exists in "companies" DB table
        ]);

        $contact = Contact::findOrFail($id);                                                                                //get contact from DB based on ID OR fail
        $contact->update($request->all());                                                                                  //update contact to DB
                                                                                 
        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');               //return to link with success msg
    }

    // ============================
    // delete specific contact by ID
    // ============================
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);                                                                                //get contact from DB based on ID OR fail
        $contact->delete();                                                                                                 //delete contact based on ID
        
        return back()->with('message', 'Contact has been deleted successfully');                                            //return to link with success msg
    }


}

