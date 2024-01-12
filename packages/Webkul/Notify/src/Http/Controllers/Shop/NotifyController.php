<?php

namespace Webkul\Notify\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
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
    public function store() :JsonResponse
    {
        $this->notifyRepository->create([
            'product_id'  => request()->input('product_id'),
            'customer_id' => request()->input('customer_id'),
        ]);

        return new JsonResponse([
            'message' => trans('notify::app.shop.message'),
        ]);
    }
}