<?php

namespace Webkul\Notify\Repository;

use Webkul\Core\Eloquent\Repository;

class NotifyRepository extends Repository
{
    /**
    * Specify the Model class name
    *
    * @return string
    */
    function model(): string
    {
        return 'Webkul\Notify\Contracts\Notify';
    }
}
