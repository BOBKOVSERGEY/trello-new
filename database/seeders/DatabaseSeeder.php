<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Board;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create(
            [
                'email' => 'sergey_bobkov@inbox.ru',
                'password' => bcrypt('doc7snb4')
            ]
        );

        Board::factory(10)->for($user)->create();
    }
}
