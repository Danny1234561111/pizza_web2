<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jobs\ProcessCommentData;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if (!app()->runningInConsole()) {
            $data = config('comment.data');

            foreach ($data as $key => $item) {
                $delay = now()->addSeconds($key * 5); // Задержка для каждого элемента
                ProcessCommentData::dispatch($item)->delay($delay);
            }
        }
    }
}
