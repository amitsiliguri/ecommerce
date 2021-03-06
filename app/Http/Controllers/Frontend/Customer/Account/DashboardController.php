<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Customer\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() : object
    {
        return view('frontend.pages.customer.account.dashboard');
    }
}
