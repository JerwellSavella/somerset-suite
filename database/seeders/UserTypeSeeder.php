<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_user_type')->insert([
            ['user_type_desc' => 'STANDARD USER', 'is_active' => 1],
            ['user_type_desc' => 'ADMIN USER', 'is_active' => 1],
        ]);
    }
}
