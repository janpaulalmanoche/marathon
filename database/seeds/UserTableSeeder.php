<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'first_name' => 'admin',
            'middle_name' => 'm',
            'last_name' => 'admin lastname',
            'role_id' => '1',
            'type_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345'),
            ],

            [
            'first_name' => 'user',
            'middle_name' => 'm',
            'last_name' => 'user lastname',
            'role_id' => '2',
            'type_id' => '1',
            'email' => 'user@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345'),
            ],

            [
            'first_name' => 'jayvaee',
            'middle_name' => 'm',
            'last_name' => 'jungco',
            'role_id' => '2',
            'type_id' => '2',
            'email' => 'participant@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345'),
            ],
            [
                'first_name' => 'par2',
                'middle_name' => 'par2',
                'last_name' => 'par2',
                'role_id' => '2',
                'type_id' => '2',
                'email' => 'participant2@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('12345'),
                ],
                [
                    'first_name' => 'part3',
                    'middle_name' => 'pa3',
                    'last_name' => 'par3',
                    'role_id' => '2',
                    'type_id' => '2',
                    'email' => 'participant3@gmail.com',
                    'password' => \Illuminate\Support\Facades\Hash::make('12345'),
                    ],

            [
                'first_name' => 'gabbi',
                'middle_name' => 'r',
                'last_name' => 'iris',
                'role_id' => '2',
                'type_id' => '3',
                'email' => 'organizer@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('12345'),
            ],
        ];

        \App\User::insert($data);
    }
}
