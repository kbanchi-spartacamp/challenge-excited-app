<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeSeeder extends Seeder
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
                'user_id' => 1,
                'title' => 'sample title 01',
                'description' => 'This is sample description.',
                'close_flg' => 0
            ],
            [
                'user_id' => 1,
                'title' => 'sample title 02',
                'description' => 'This is sample description.',
                'close_flg' => 1
            ],
        ];
        DB::table('challenges')->insert($param);
    }
}
