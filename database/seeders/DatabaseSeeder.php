<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $category = Category::factory()->create(['name' => 'Comédie']);
        // Category::factory()->create(['name' => 'Action']);
        // $categories = Category::factory(8)->create();

        // Movie::factory(20)->for($categories->random())->create();
        // Movie::factory(20)->for($category)->create();
        // Movie::factory(20)->create(function () use ($categories) {
        //     return ['category_id' => $categories->random()];
        // });

        User::factory()->create([
            'email' => 'samsam@gmail.com',
            'name' => 'Sam',
        ]);

        $key = config('services.moviedb.key');
        $client = Http::withoutVerifying();

        $genres = $client->get('https://api.themoviedb.org/3/genre/movie/list?api_key='.$key.'&language=fr_FR')->json('genres');

        foreach ($genres as $genre) {
            Category::factory()->create([
                'id' => $genre['id'],
                'name' => $genre['name'],
            ]);
        }

        for ( $i = 1; $i < 5; $i++) {
            $movies = $client->get('https://api.themoviedb.org/3/movie/popular?api_key='.$key.'&language=fr-FR&page='.$i)->json('results');
            foreach ($movies as $movie) {

                $movie = $client->get('https://api.themoviedb.org/3/movie/'.$movie['id'].'?api_key='.$key.'&language=fr-FR&append_to_response=credits')->json();

                $movieModel = Movie::factory()->create([
                    'title' => $movie['title'],
                    'synopsis' => $movie['overview'],
                    'cover' => 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'],
                    'released_at' => $movie['release_date'] ?? null,
                    'category_id' => $movie['genres'][0]['id'] ?? null,
                ]);

                foreach(collect($movie['credits']['cast'])->take(2) as $cast) {
                    $actor = $client->get('https://api.themoviedb.org/3/person/'.$cast['id'].'?api_key='.$key.'&language=fr-FR')->json();

                    $actor = Actor::factory()->create([
                        'name' => $actor['name'],
                        'avatar' => 'https://image.tmdb.org/t/p/w500'.$actor['profile_path'],
                        'birthday' => $actor['birthday'] ?? null,
                    ]);

                    // On lie l'acteur au film.....
                    $movieModel->actors()->attach($actor);
                }
    
            }

            
        }        

        // foreach ($movies as $movie) {
        //     Movie::factory()->create([
        //         'title' => $movie['title'],
        //         'synopsis' => $movie['overview'],
        //         'cover' => 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'],
        //         'released_at' => $movie['release_date'] ?? null,
        //         'category_id' => $movie['genre_ids'][0] ?? null,
        //     ]);

        // }

        // for ($i = 0; $i < 20; $i++) {
        //     Movie::factory()->create(['category_id' => $categories->random()]);
        // }
    }
}
