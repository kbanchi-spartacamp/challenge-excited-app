<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['name' => '勇者'],
            ['name' => '魔法使い'],
            ['name' => '武闘家'],
        ];
        DB::table('avator_categories')->insert($param);
    }
}
