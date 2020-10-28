<?php

namespace App\Http\Controllers\Frontend\Customer\Account\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() : object
    {
        return view('frontend.pages.customer.account.address.index');
    }
}
