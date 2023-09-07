<?php

namespace App\Providers;

use App\Events\FileDownloaded;
use App\Listeners\FillFileDetails;
use App\Listeners\UpdateDownloadedCount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'downloadFile' => [
            FillFileDetails::class,
            UpdateDownloadedCount::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // Event::listen('downloadFile', FillFileDetails::class);
        // Event::listen('downloadFile', UpdateDownloadedCount::class);

        // Event::listen('downloadFile', function($request, $file){
        //     DB::table('details')->insert([
        //         'file_id' => $file->id,
        //         'ip' => $request->ip(),
        //         'user_agent' => $request->userAgent(),
        //         'downloaded_at' => now(),
        //     ]);
        // });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
