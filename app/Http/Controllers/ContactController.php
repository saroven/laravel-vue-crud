<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function showContacts()
    {
        return view('contacts');
    }

    public function index()
    {
        $contacts = Contact::all();
        return response()->json([
            'contacts' => $contacts
        ]);
    }

    public function getContactData($id)
    {
        $contact = Contact::find($id);

        return response()->json([
            'contact' => $contact
        ]);
    }

    public function updateContact(Request $request)
    {
        $contact = Contact::find($request->get('id'));

//        |unique:contacts,phone'.$contact->id

        if (!empty($contact)) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|max:255',
                'phone' => 'required|max:11',
            ]);

            $contact->name = $request->get('name');
            $contact->email = $request->get('email');
            $contact->phone = $request->get('phone');

            if ($contact->update()) {
                return response()->json(
                    [
                        'type' => "success",
                        'msg' => "Updated Successful"
                    ]
                );
            } else {
                return response()->json(
                    [
                        'type' => "error",
                        'error' => "Something went Wrong!"
                    ]
                );
            }
        }
        return response()->json(
            [
                'requestData' => $request->all(),
                'contact' => $contact
            ]
        );
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);

        if (!empty($contact)) {
            $contact->delete();

            return response()->json(
                [
                    'type' => "success",
                    'msg' => "Deleted Successful"
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => "error",
                    'error' => "Something went Wrong!"
                ]
            );
        }
    }

    public function addContact(Request $request)
    {
        $contact = new Contact();

        $contact->name = $request->get('name');

        $contact->email = $request->get('email');

        $contact->phone = $request->get('phone');

        $contact->save();

        return $contact;
    }
}
