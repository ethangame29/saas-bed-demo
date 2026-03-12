<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Return Paginated List of Contacts.
     *
     * Returns A paginated List of Contacts, currently there is no way to specify the pagination, it defaults to 5.
     *
     */
    public function index()
    {
        $contacts = Contact::paginate(5);
        #    ->toResourceCollection();
        #return response()->json($contacts);
        return ContactResource::collection($contacts);
    }

    /**
     * Store a newly created Contact.
     *
     */
    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();
        $contact = Contact::create($validated);
        return response()->json($contact, 201);
    }

    /**
     * Return the specified Contact.
     */
    public function show(Contact $contact)
    {
        $result = $contact->toResource();
        return response()->json($result);
    }

    /**
     * Update the specified Contact.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $validated = $request->validated();
        $contact->update($validated);
        return response()->json($contact,201);
    }

    /**
     * Remove the specified Contact.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
