<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['family-name', 'given-name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['family-name', 'given-name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        $contact['fullname'] =
            $contact['family-name'] . $contact['given-name'];

        Contact::create($contact);

        return view('thanks');
    }
}
