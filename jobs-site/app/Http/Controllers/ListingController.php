<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index() {
        // Get all listings
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get(),
        ]);
    }

    public function show(Listing $listing) { // Route Model binding
        // Show one listing
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
