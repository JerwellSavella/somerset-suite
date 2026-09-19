<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_group_list')->insert([
            ['group_num' => 1, 'is_active' => 1],
            ['group_num' => 2, 'is_active' => 1],
            ['group_num' => 3, 'is_active' => 1],
            ['group_num' => 4, 'is_active' => 1],
            ['group_num' => 5, 'is_active' => 1],
        ]);
    }
}
