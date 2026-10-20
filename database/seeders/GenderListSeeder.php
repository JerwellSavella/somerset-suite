<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_gender_list')->insert([
            ['gender_desc' => 'MALE', 'is_active' => 1],
            ['gender_desc' => 'FEMALE', 'is_active' => 1],
        ]);
    }
}
