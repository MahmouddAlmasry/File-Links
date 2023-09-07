<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateDownloadedCount
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
        DB::update('update files set downloaded_count = ? where id = ?',[($file->downloaded_count + 1), $file->id]);
    }
}
