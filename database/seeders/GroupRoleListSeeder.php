<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupRoleListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_group_role_list')->insert([
            ['group_role_abbr' => 'GO', 'group_role_desc' => 'GROUP OVERSEER', 'is_active' => 1],
            ['group_role_abbr' => 'AO', 'group_role_desc' => 'ASSISTANT OVERSEER', 'is_active' => 1],
        ]);
    }
}
