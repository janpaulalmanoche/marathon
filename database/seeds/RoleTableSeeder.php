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


            $data1= [
                        [
                            'category' => 'kids dash'
                        ],
                        [
                            'category' => 'individual'
                        ]
                ];

                App\Category::insert($data1);

                $dis   = [
                    [
                        'category_id' => 1,
                        'distance' => 10,
                        'measurement' => 'km'
                    ]
                    ];
                    // App\CategoryDistance::insert($dis);

    }
}
