<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Comic;
use App\Models\Distributor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory()
        ->times(3)
        ->create();

        foreach(Author::all() as $author)
        {
            $comics = Comic::inRandomOrder()->take(rand(1,3))->pluck('id');
            $author->comics()->attach($comics);
        }
    }
}
