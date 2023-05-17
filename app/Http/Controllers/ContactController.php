<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::with('addresses:id,address,contact_id',
        'phoneNumbers:id,phone_number,contact_id')->get();
        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {
            $contact = Contact::create($validatedData);
            return response()->json($contact);
        } else {
            return response()->json(['errors' => $request->messages()], 405);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $validatedData = $request->validated();

        if ($validatedData) {
            $contact->update($validatedData);
            return response()->json($contact);
        } else {
            return response()->json(['errors' => $request->messages()], 405);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['message' => 'Contact deleted successfully']);
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->has('q')) {
            $q = $request->input('q');
            $query->where('first_name', 'LIKE', "%$q%")
                  ->orWhere('last_name', 'LIKE', "%$q%")
                  ->orWhereHas('addresses', function ($subQuery) use ($q) {
                      $subQuery->where('address', 'LIKE', "%$q%");
                  });
        }
        $contacts = $query->get();
        return response()->json($contacts);
    }
}
