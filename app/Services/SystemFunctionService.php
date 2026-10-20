<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class SystemFunctionService
{
    /**
     * Get the list of systems a given publisher currently has active access to.
     */
    public static function forPublisher(int $publisherId): Collection
          {
               return DB::table('tbl_publisher_sys_access as a')
                    ->join('tbl_system_list as s', 'a.sys_id', '=', 's.id')
                    ->select([
                         's.id',
                         's.sys_code',
                         's.sys_name',
                         's.sys_desc',
                         's.sys_link',
                         's.sys_type',
                         's.is_sso',
                    ])
                    ->where('a.publisher_id', $publisherId)
                    ->where('a.is_active', 1)
                    ->where('s.is_active', 1)
                    ->get();
          }
}
