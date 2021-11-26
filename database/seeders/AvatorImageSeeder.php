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
                'image_path' => 'yuusya/yuusya_game.png'
            ],
            [
                'avator_category_id' => 1,
                'level' => 10,
                'image_path' => 'yuusya/yuusya_1.png'
            ],
            [
                'avator_category_id' => 1,
                'level' => 25,
                'image_path' => 'yuusya/yuusya_2.png'
            ],
            [
                'avator_category_id' => 1,
                'level' => 50,
                'image_path' => 'yuusya/yuusya_3.png'
            ],
            [
                'avator_category_id' => 1,
                'level' => 75,
                'image_path' => 'yuusya/yuusya_4.png'
            ],
            [
                'avator_category_id' => 1,
                'level' => 100,
                'image_path' => 'yuusya/yuusya_game.png'
            ],
            [
                'avator_category_id' => 2,
                'level' => -1,
                'image_path' => 'mahoutsukai/mahoutsukai_man.png'
            ],
            [
                'avator_category_id' => 2,
                'level' => 10,
                'image_path' => 'mahoutsukai/mahoutsukai_1.png'
            ],
            [
                'avator_category_id' => 2,
                'level' => 25,
                'image_path' => 'mahoutsukai/mahoutsukai_2.png'
            ],
            [
                'avator_category_id' => 2,
                'level' => 50,
                'image_path' => 'mahoutsukai/mahoutsukai_3.png'
            ],
            [
                'avator_category_id' => 2,
                'level' => 75,
                'image_path' => 'mahoutsukai/mahoutsukai_4.png'
            ],
            [
                'avator_category_id' => 2,
                'level' => 100,
                'image_path' => 'mahoutsukai/mahoutsukai_man.png'
            ],
            [
                'avator_category_id' => 3,
                'level' => -1,
                'image_path' => 'butouka/kung-fu_man.png'
            ],
            [
                'avator_category_id' => 3,
                'level' => 10,
                'image_path' => 'butouka/butouka_1.png'
            ],
            [
                'avator_category_id' => 3,
                'level' => 25,
                'image_path' => 'butouka/butouka_2.png'
            ],
            [
                'avator_category_id' => 3,
                'level' => 50,
                'image_path' => 'butouka/butouka_3.png'
            ],
            [
                'avator_category_id' => 3,
                'level' => 75,
                'image_path' => 'butouka/butouka_4.png'
            ],
            [
                'avator_category_id' => 3,
                'level' => 100,
                'image_path' => 'butouka/kung-fu_man.png'
            ],
        ];
        DB::table('avator_images')->insert($param);
    }
}
