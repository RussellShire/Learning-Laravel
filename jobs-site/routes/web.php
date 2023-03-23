<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut faucibus quam id ante congue, at commodo sem bibendum. Fusce eu nulla eget neque sagittis hendrerit sit amet eu turpis. Proin venenatis ut nisi vel molestie. Proin vitae ultricies neque. Etiam convallis at justo at sodales. Maecenas vitae diam eget nibh eleifend faucibus in eu tellus. Suspendisse tincidunt metus semper nibh euismod, sit amet viverra tortor venenatis. Curabitur lacus justo, aliquet ac gravida non, bibendum vehicula est. Mauris commodo nisl ultricies, ullamcorper tortor vitae, consectetur ante. Curabitur vel ante ac orci rhoncus fringilla. Pellentesque venenatis nisl eu lectus commodo fringilla. Sed velit neque, tincidunt id turpis id, dictum dapibus libero. Morbi congue vulputate nisi. Morbi et dui vitae erat auctor viverra. Nullam ut ultricies ipsum.',
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut faucibus quam id ante congue, at commodo sem bibendum. Fusce eu nulla eget neque sagittis hendrerit sit amet eu turpis. Proin venenatis ut nisi vel molestie. Proin vitae ultricies neque. Etiam convallis at justo at sodales. Maecenas vitae diam eget nibh eleifend faucibus in eu tellus. Suspendisse tincidunt metus semper nibh euismod, sit amet viverra tortor venenatis. Curabitur lacus justo, aliquet ac gravida non, bibendum vehicula est. Mauris commodo nisl ultricies, ullamcorper tortor vitae, consectetur ante. Curabitur vel ante ac orci rhoncus fringilla. Pellentesque venenatis nisl eu lectus commodo fringilla. Sed velit neque, tincidunt id turpis id, dictum dapibus libero. Morbi congue vulputate nisi. Morbi et dui vitae erat auctor viverra. Nullam ut ultricies ipsum.',
            ]
        ]

    ]);
});
