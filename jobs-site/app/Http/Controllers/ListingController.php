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
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4),
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

    // Show edit form
    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    // Show manage form
    public function manage() {
        return view('listings.manage',
            ['listings' => auth()->user()->listings()->get() // Get all the logged-in users listings (via eloquent relationships)
        ]);
    }

    // Update listing data
    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([     // take the request and add validation
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            // TO-DO add validation for tags to only allow commas and whitespace
            'tags' => 'required',
            'description' => 'required',
        ]);

        // Storing a logo image file at 'storage/app/pubic/logos'
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('/listings/' . $listing->id)
            ->with('message', 'Listing updated successfully!'); // Creates a message that can be passed to a component
    }

    // Store create form data
    public function store(Request $request) {
//        dd($request->file('logo'));
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

        // Storing a logo image file at 'storage/app/pubic/logos'
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Adding the id of the logged-in user to the Listing
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields); // actually submit to the database

        return redirect('/')
            ->with('message', 'Listing created successfully!'); // Creates a message that can be passed to a component
    }

    // Delete listing
     public function destroy(Listing $listing) {
        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
     }
}
