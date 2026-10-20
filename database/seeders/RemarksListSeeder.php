<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RemarksListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_remarks_list')->insert([
            ['remarks_abbr' => 'P', 'remarks_desc' => 'PUBLISHER', 'is_active' => 1],
            ['remarks_abbr' => 'AP', 'remarks_desc' => 'AUXILIARY', 'is_active' => 1],
            ['remarks_abbr' => 'RP', 'remarks_desc' => 'REGULAR', 'is_active' => 1],
            ['remarks_abbr' => 'SP', 'remarks_desc' => 'SPECIAL PIONEER', 'is_active' => 1],
        ]);
    }
}
