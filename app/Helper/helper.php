<?php

use Illuminate\Support\Facades\DB;

function application()
{
    return DB::table('applications')->first();
}

function topbar_contact()
{
    return DB::table('contacts')
        ->where('status', 'active')
        ->whereIn('type', ['head_office', 'branch'])
        ->orderByRaw("CASE WHEN type = 'head_office' THEN 0 ELSE 1 END")
        ->first();
}









