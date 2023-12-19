<?php

namespace Webkul\Notify\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Notify\Contracts\Notify as NotifyContract;

class Notify extends Model implements NotifyContract
{
    protected $table = 'notify';

    protected $fillable = [
        'product_id',
        'customer_id',
        'send_notification',
    ];
}