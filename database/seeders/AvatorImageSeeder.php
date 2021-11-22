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
                'level' => -1,
                'image_path' => 'yuusya_game.png'
            ],
            [
                'avator_category_id' => 2,
                'level' => -1,
                'image_path' => 'mahoutsukai_man.png'
            ],
            [
                'avator_category_id' => 3,
                'level' => -1,
                'image_path' => 'kung-fu_man.png'
            ],
            [
                'avator_category_id' => 1,
                'level' => 10,
                'image_path' => 'yuusya_game.png'
            ],
            [
                'avator_category_id' => 2,
                'level' => 10,
                'image_path' => 'mahoutsukai_man.png'
            ],
            [
                'avator_category_id' => 3,
                'level' => 10,
                'image_path' => 'kung-fu_man.png'
            ],
        ];
        DB::table('avator_images')->insert($param);
    }
}
