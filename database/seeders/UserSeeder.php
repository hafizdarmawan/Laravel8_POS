<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name'      => 'Administrator',
                'email'     => 'admin@email.com',
                'password'  => bcrypt('12345678'),
                'foto'      => '/img/user.jpg',
                'level'     => 1
            ],
            [
                'name'      => 'kasir 1',
                'email'     => 'kasir1@email.com',
                'password'  => bcrypt('12345678'),
                'foto'      => '/img/user.jpg',
                'level'     => 2
            ]
        );

        array_map(function (array $user) {
            User::query()->updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }, $users);
    }
}
