<?php

namespace App\Http\Controllers\Frontend\Checkout\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;

class BillingMethodsController extends Controller
{
    public function getAvailableBillingMethods(Request $request) : array
    {


        $availableBillingMethods = collect([
            [
                'id' => 1,
                'code' => 'cod',
                'label' => 'Cash on Delivery'
            ],
            [
                'id' => 1,
                'code' => 'account_credit',
                'label' => 'Credit Account',
            ],
            [
                'id' => 1,
                'code' => 'account_balance',
                'label' => 'Account Balance'
            ],
        ]);

        $data = [
            'payment_method' => $availableBillingMethods,
            'credit_limit' => 10000,
            'account_balamce_amount' => 2000
        ];

        if($request->ajax()){
            return $data;
        } else {
            return abort(404);
        }

    }
}
