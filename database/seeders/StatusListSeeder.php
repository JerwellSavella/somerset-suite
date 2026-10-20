<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_status_list')->insert([
            ['status_abbr' => 'AT', 'status_desc' => 'ACTIVE', 'is_active' => 1],
            ['status_abbr' => 'IC', 'status_desc' => 'INACTIVE', 'is_active' => 1],
            ['status_abbr' => 'RT', 'status_desc' => 'RESTRICTION', 'is_active' => 1],
            ['status_abbr' => 'DF', 'status_desc' => 'DISFELLOWED', 'is_active' => 1],
        ]);
    }
}
