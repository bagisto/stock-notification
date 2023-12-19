<?php

namespace Webkul\Notify\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'catalog.product.update.after' => [
            'Webkul\Notify\Listeners\ProductUpdateAfterListener',
        ],
    ];
}
