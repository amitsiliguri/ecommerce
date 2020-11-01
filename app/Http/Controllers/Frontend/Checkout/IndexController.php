<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;

class IndexController extends Controller
{
    public function index() : object
    {

        $addresses = collect([
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
                'type' => 3
            ],
            [
                'id' => 2,
                'first_name' => 'Sumit',
                'last_name' => 'Biswas',
                'company' => '',
                'phone' => '9475585924',
                'address' => 'Biswas House',
                'street' => 'BBD sarani',
                'land_mark' => 'Shanti Villa',
                'address_type' => 'Residential',
                'country' => 'India',
                'state' => 'Sikkim',
                'city' => 'Siliguri',
                'zip' => '734007',
                'type' => 3
            ],
            [
                'id' => 3,
                'first_name' => 'Pramit',
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
                'type' => 2
            ],
            [
                'id' => 4,
                'first_name' => 'Nimit',
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
                'type' => 1
            ],
            [
                'id' => 5,
                'first_name' => 'Swati',
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
                'type' => 3
            ],
            [
                'id' => 6,
                'first_name' => 'Suman',
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
                'type' => 3
            ]
        ]);

        return view('frontend.pages.checkout.index')->with(
            [
                'addresses' => $addresses
            ]
        );
    }
}
