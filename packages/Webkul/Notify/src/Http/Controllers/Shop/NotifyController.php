<?php

namespace Webkul\Notify\Http\Controllers\Shop;

use Illuminate\Http\Request;
use Webkul\Notify\Http\Controllers\Controller;
use Webkul\Notify\Repository\NotifyRepository;

class NotifyController extends Controller
{
    /**
     * Create a controller instance.
     * 
     * @param  \Webkul\Notify\Repository\NotifyRepository  $NotifyRepository
     * @return void
     */
    public function __construct(protected NotifyRepository $notifyRepository)
    {
    }

    /**
     * Store.
     * 
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->notifyRepository->create([
            'product_id'   => $request->product_id,
            'customer_id'  => $request->customer_id,
        ]);
    }
}