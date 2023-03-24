<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Listing::factory(4)->create();

//        Listing::create([
//            'title' => 'Junior Laravel Developer',
//            'tags' => 'laravel, javascript',
//            'company' => 'Juicy Media',
//            'location' => 'Manchester, UK',
//            'email' => 'test@juicy.com',
//            'website' => 'https://www.juicymedia.co.uk',
//            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin hendrerit, ex quis blandit dapibus, ligula tortor fermentum arcu, quis pulvinar nisi enim id mi. Nulla faucibus mauris sed nisi vulputate, et porta sem congue. Nunc porta accumsan feugiat. Maecenas a mi lorem. Maecenas efficitur eget magna sit amet varius. Mauris sit amet ullamcorper magna, sed rutrum nisl. Pellentesque elementum mollis nunc, at iaculis ipsum dictum in. In tincidunt lorem sed elementum ultricies. Curabitur auctor mauris vel odio pellentesque, et commodo tellus tincidunt. Aliquam mattis non eros vel viverra.',
//        ]);
//
//        Listing::create([
//            'title' => 'Junior PHP Developer',
//            'tags' => 'PHP, javascript',
//            'company' => 'Dry Media',
//            'location' => 'Liverpool, UK',
//            'email' => 'test@dry.com',
//            'website' => 'https://www.drymedia.co.uk',
//            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin hendrerit, ex quis blandit dapibus, ligula tortor fermentum arcu, quis pulvinar nisi enim id mi. Nulla faucibus mauris sed nisi vulputate, et porta sem congue. Nunc porta accumsan feugiat. Maecenas a mi lorem. Maecenas efficitur eget magna sit amet varius. Mauris sit amet ullamcorper magna, sed rutrum nisl. Pellentesque elementum mollis nunc, at iaculis ipsum dictum in. In tincidunt lorem sed elementum ultricies. Curabitur auctor mauris vel odio pellentesque, et commodo tellus tincidunt. Aliquam mattis non eros vel viverra.',
//        ]);
    }
}
