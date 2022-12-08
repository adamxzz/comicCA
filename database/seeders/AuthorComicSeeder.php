<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Comic;
use Database\Factories\AuthorComicFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class AuthorComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //  AuthorComic::factory()->times(10)->create();

    //   $authors = Author::all();
    //   $comics = Comic::all();

    //   return [
    //       'author_id' => $authors->random()->id,
    //       'comic_id' => $comics->random()->id
    //   ];

    }
}
