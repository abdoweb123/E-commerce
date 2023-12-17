<?php

namespace Modules\Order\Http\Controllers\Admin;

use Modules\Order\Entities\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderPrintController
{
    /**
     * Show the specified resource.
     *
     * @param \Modules\Order\Entities\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load('products', 'coupon', 'taxes');


           $pdf = PDF::loadView('admin.storefront.order.show', compact('order'));

//       dd($pdf);

         return $pdf->download('invoice.pdf');

    }
}
