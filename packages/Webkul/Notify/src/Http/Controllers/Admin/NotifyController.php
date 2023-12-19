<?php

namespace Webkul\Notify\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Notify\DataGrids\NotifyDataGrid;
use Webkul\Notify\Http\Controllers\Controller;
use Webkul\Notify\Repository\NotifyRepository;
use Webkul\Notify\Mail\ProductBackInStockNotification;
use Webkul\Product\Repositories\ProductRepository;

class NotifyController extends Controller
{
    /**
     * Create a controller instance.
     * 
     * @param  \Webkul\Notify\Repository\NotifyRepository  $notifyRepository
     * @param  \Webkul\Customer\Repositories\CustomerRepository  $customerRepository
     * @param   \Webkul\Product\Repositories\ProductRepository $productRepository
     * @return void
     */
    public function __construct(
        protected NotifyRepository   $notifyRepository,
        protected CustomerRepository $customerRepository,
        protected ProductRepository  $productRepository
    ) {
    }

    /**
     * Index.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(NotifyDataGrid::class)->toJson();
        }
        
        return view('notify::admin.index');
    }

    /**
     * Store.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        return redirect()->route('notify.admin.index');
    }

    /**
     * Store.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function updateStockStatus(Request $request)
    {
        $notificationId = $request->notificationId;

        try {
            $data = $this->notifyRepository->find($notificationId);

            $customer = $this->customerRepository->find($data->customer_id);

            $product = $this->productRepository->find($data->product_id);

            Mail::queue(new ProductBackInStockNotification($product, $customer));

            return response()->json(['message' => 'Stock status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}