<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class FillFileDetails
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($request, $file): void
    {
        DB::table('details')->insert([
            'file_id' => $file->id,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'downloaded_at' => now(),
        ]);

    }
}
