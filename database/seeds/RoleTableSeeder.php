<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
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
            'role' => 'admin'
            ],

            [
                'role' => 'user'
            ]
        ];

        \App\Role::insert($data);
    }
}
