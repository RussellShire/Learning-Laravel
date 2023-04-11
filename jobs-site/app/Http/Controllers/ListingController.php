<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index() {
        // Get all listings
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get() ,
        ]);
    }

    public function show(Listing $listing) { // Route Model binding
        // Show one listing
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create() {
        return view('listings.create');
    }

    // Store create form data
    public function store(Request $request) {
//        dd($request->all());
        $formFields = $request->validate([     // take the request and add validation
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            // TO-DO add validation for tags to only allow commas and whitespace
            'tags' => 'required',
            'description' => 'required',
        ]);

        Listing::create($formFields); // actually submit to the database

        return redirect('/')
            ->with('message', 'Listing created successfully!'); // Creates a message that can be passed to a component
    }
}
