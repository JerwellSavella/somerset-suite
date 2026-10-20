<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_role_list')->insert([
            ['role_abbr' => 'SHP', 'role_desc' => 'SHIP', 'is_active' => 1],
            ['role_abbr' => 'EDR', 'role_desc' => 'ELDER', 'is_active' => 1],
            ['role_abbr' => 'MS', 'role_desc' => 'MINISTERIAL SERVANT', 'is_active' => 1],
        ]);
    }
}
