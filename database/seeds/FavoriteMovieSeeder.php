<?php

use Illuminate\Database\Seeder;

class FavoriteMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('favorite_movies')->insert([
            [
            'user_id' => 1,
             'movie_id' => 1
            ],
            ['user_id' => 1,
             'movie_id' => 2
            ],
            ['user_id' => 1,
             'movie_id' => 3
            ],
            ['user_id' => 1,
             'movie_id' => 4
            ],
            ['user_id' => 1,
             'movie_id' => 5
            ],
            ['user_id' => 1,
             'movie_id' => 6
            ],
            ['user_id' => 1,
             'movie_id' => 7
            ],
            ['user_id' => 1,
             'movie_id' => 8
            ],
            ['user_id' => 1,
             'movie_id' => 9
            ],
            ['user_id' => 1,
             'movie_id' => 10
            ],
            ['user_id' => 1,
             'movie_id' => 11
            ],
            ['user_id' => 1,
             'movie_id' => 12
            ],
            ['user_id' => 1,
             'movie_id' => 13
            ],
            ['user_id' => 1,
             'movie_id' => 14
            ],
            ['user_id' => 1,
             'movie_id' => 15
            ],
            ['user_id' => 1,
             'movie_id' => 16
            ],
            ['user_id' => 1,
             'movie_id' => 17
            ],
            ['user_id' => 1,
             'movie_id' => 18
        ],
        ]);
    }
}
