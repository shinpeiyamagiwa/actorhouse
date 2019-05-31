<?php

use Illuminate\Database\Seeder;

class FavoriteActorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('favorite_actors')->insert([
            [
            'user_id' => 1,
             'actor_id' => 1
            ],
            ['user_id' => 1,
             'actor_id' => 2
            ],
            ['user_id' => 1,
             'actor_id' => 3
            ],
            ['user_id' => 1,
             'actor_id' => 4
            ],
            ['user_id' => 1,
             'actor_id' => 5
            ],
            ['user_id' => 1,
             'actor_id' => 6
            ],
            ['user_id' => 1,
             'actor_id' => 7
            ],
            ['user_id' => 1,
             'actor_id' => 8
            ],
            ['user_id' => 1,
             'actor_id' => 9
            ],
            ['user_id' => 1,
             'actor_id' => 10
            ],
            ['user_id' => 1,
             'actor_id' => 11
            ],
            ['user_id' => 1,
             'actor_id' => 12
            ],
            ['user_id' => 1,
             'actor_id' => 13
            ],
            ['user_id' => 1,
             'actor_id' => 14
            ],
            ['user_id' => 1,
             'actor_id' => 15
            ],
            ['user_id' => 1,
             'actor_id' => 16
            ],
            ['user_id' => 1,
             'actor_id' => 17
            ],
            ['user_id' => 1,
             'actor_id' => 18
        ],
        ]);
    }
}
