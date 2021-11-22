<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
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
                'challenge_id' => 1,
                'comment' => 'This is sample commment.'
            ],
        ];
        DB::table('comments')->insert($param);
    }
}
