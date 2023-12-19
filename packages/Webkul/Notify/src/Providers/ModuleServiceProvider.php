<?php

namespace Webkul\Notify\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\Notify\Models\Notify::class,
    ];
}
