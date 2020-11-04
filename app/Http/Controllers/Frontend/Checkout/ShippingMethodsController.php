<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;

class ShippingMethodsController extends Controller
{
    public function getAvailableMethods(Request $request) : array
    {


        $methods = collect([
            [
                'id' => 1,
                'code' => 'fixed_rate',
                'label' => 'Fixed Rate',
                'price' => 10,
            ],
            [
                'id' => 1,
                'code' => 'self_pickup',
                'label' => 'Self Pickup',
                'price' => 0,
            ]
        ]);

        $pickupLocations = collect([
            [
                'id' => 1,
                'first_name' => 'Amit',
                'last_name' => 'Biswas',
                'company' => '',
                'phone' => '9475585924',
                'address' => 'Biswas House',
                'street' => 'BBD sarani',
                'land_mark' => 'Shanti Villa',
                'address_type' => 'Residential',
                'country' => 'India',
                'state' => 'West Bengal',
                'city' => 'Siliguri',
                'zip' => '734007',
            ],
            [
                'id' => 1,
                'first_name' => 'Suman',
                'last_name' => 'Biswas',
                'company' => '',
                'phone' => '9434329970',
                'address' => 'Biswas Traders, 1st floor, Nanak Tower',
                'street' => 'Sevoke Rorad',
                'land_mark' => 'Near Bank of Baroda',
                'address_type' => 'Residential',
                'country' => 'India',
                'state' => 'West Bengal',
                'city' => 'Siliguri',
                'zip' => '734001',
            ],
        ]);

        $data = [
            'available_methods' => $methods,
            'pickup_locations' => $pickupLocations
        ];

        if($request->ajax()){
            return $data;
        } else {
            return abort(404);
        }

    }
}
