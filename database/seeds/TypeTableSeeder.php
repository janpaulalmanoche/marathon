<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
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
              'type' => 'staff'
          ],
          [
              'type' => 'participant'
          ],
          [
              'type' => 'organizer'
          ]
      ];

      \App\Type::insert($data);
    }
}
