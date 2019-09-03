<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Contact;
class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::paginate(10);
        return view('bloodbank/contacts/index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $contact=Contact::findOrFail($id);
        return view('bloodbank/contacts/show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $contact=Contact::findOrFail($id);
        $contact->delete();
        return back();
    }
}
