<?php

namespace App\Listeners;

use App\Events\ProductCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class Product
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
    public function handle(ProductCreate $event): void
    {
        Log::info("çalıştır32");
    }
}
