<?php

namespace App\Http\Controllers\Frontend\Customer\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() : object
    {
        return view('frontend.pages.customer.account.profile');
    }
}
