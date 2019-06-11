<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Rules\StateRule;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(2);

        return view('pages.index', compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = require app_path("states.php");

        return view('pages.create', compact("states"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'max:255',
            'birthday' => 'nullable|date',
            'address' => 'max:255',
            'city' => 'max:255',
            'state' => [new StateRule()],
            'zipcode' => 'max:255'
        ]);

        $contact = new Contact();
        $contact->fill($validatedData);
        $contact->save();

        return \Redirect::route("contacts.edit", [$contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $states = require app_path("states.php");

        $birthday_year = "";
        $birthday_month = "";
        $birthday_day = "";
        if ($contact->birthday) {
            list($birthday_year, $birthday_month, $birthday_day) = explode("-", $contact->birthday);
        }

        return view("pages.edit", compact(
            "contact",
            "states",
            "birthday_year",
            "birthday_month",
            "birthday_day"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'max:255',
            'birthday' => 'nullable|date',
            'address' => 'max:255',
            'city' => 'max:255',
            'state' => [new StateRule()],
            'zipcode' => 'max:255'
        ]);

        $contact->fill($validatedData);
        $contact->save();

        return \Redirect::route("contacts.edit", [$contact]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return \Redirect::route("contacts.index");
    }
}
