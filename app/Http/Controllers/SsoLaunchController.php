<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SsoLaunchController extends Controller
{
    public function launch(Request $request, int $sysId): RedirectResponse
    {
        $system = DB::table('tbl_system_list')->where('id', $sysId)->where('is_active', 1)->first();

        if (! $system) {
            abort(404);
        }

        // Opportunistic cleanup: ~5% chance per launch, removes tokens
        // that expired more than an hour ago. No cron/scheduler needed.
        if (random_int(1, 100) <= 5) {
            DB::table('tbl_sso_tokens')->where('expires_at', '<', now()->subHours(1))->delete();
        }

        $token = Str::random(64);

        DB::table('tbl_sso_tokens')->insert([
            'token' => $token,
            'publisher_id' => $request->user()->id,
            'sys_code' => $system->sys_code,
            'expires_at' => now()->addSeconds(60),
            'used' => 0,
            'created_at' => now(),
        ]);

        return redirect()->away("{$system->sys_link}/sso-login?token={$token}");
    }
}
