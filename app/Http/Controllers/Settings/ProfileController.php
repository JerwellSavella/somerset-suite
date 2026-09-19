<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Show the user's profile (read-only).
     */
    public function edit(Request $request): Response
    {
        $profile = DB::table('tbl_publisher_info as p')
            ->join('tbl_gender_list as g', 'p.gender_id', '=', 'g.id')
            ->join('tbl_role_list as r', 'p.role_id', '=', 'r.id')
            ->join('tbl_status_list as s', 'p.status_id', '=', 's.id')
            ->join('tbl_remarks_list as rm', 'p.remarks_id', '=', 'rm.id')
            ->join('tbl_user_type as ut', 'p.user_type', '=', 'ut.id')
            ->join('tbl_group_list as gr', 'p.group_id', '=', 'gr.id')
            ->select([
                'p.first_name', 'p.last_name', 'p.middle_name', 'p.suffix',
                'p.birth_date', 'p.baptism_date', 'p.email_add', 'p.phone_num',
                'g.gender_desc',
                'r.role_desc',
                's.status_desc',
                'rm.remarks_desc',
                'ut.user_type_desc',
                'gr.group_num',
            ])
            ->where('p.id', $request->user()->id)
            ->first();

        return Inertia::render('settings/profile', [
            'profile' => $profile,
            'age' => $profile?->birth_date ? Carbon::parse($profile->birth_date)->age : null,
        ]);
    }
}
