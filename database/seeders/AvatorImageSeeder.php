<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatorImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'avator_category_id' => 1,
                'level' => 10,
                'image_path' => 'brave_01.png'
            ],
            [
                'avator_category_id' => 1,
                'level' => 25,
                'image_path' => 'brave_02.png'
            ],
        ];
        DB::table('avator_images')->insert($param);
    }
}
