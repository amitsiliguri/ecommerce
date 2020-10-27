<?php

namespace App\Http\Controllers\Frontend\Customer\Account\OrderHistory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() : object
    {
        $headers = array (
            array(
                "name"=>"Order",
                "key"=>"order_id",
                "type" => "data",
            ),
            array(
                "name"=>"Date",
                "key"=>"created_at",
                "type" => "data",
            ),
            array(
                "name"=>"Ship to",
                "key"=>"shipping_address_name",
                "type" => "data",
            ),
            array(
                "name"=>"Order Total",
                "key"=>"order_total",
                "type" => "data",
            ),
            array(
                "name"=>"Status",
                "key"=>"order_status",
                "type" => "html",
            ),
            array(
                "name"=>"Invoice",
                "key"=>"pdf",
                "type" => "html",
            ),
            array(
                "name"=>"Actions",
                "key"=>"actions",
                "type" => "html",
            ),
        );
        $tableData = array (
            array(
                "order_id" => "SF0001",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
                "pdf" => "#",
            ),
            array(
                "order_id" => "SF0002",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
                "pdf" => "#",
            ),
            array(
                "order_id" => "SF0003",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
                "pdf" => "#",
            ),
            array(
                "order_id" => "SF0004",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
                "pdf" => "#",
            ),
            array(
                "order_id" => "SF0005",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
                "pdf" => "#",
            )
        );
        return view('frontend.pages.customer.account.order-history')->with(
            [
                'headers' => $headers,
                'tableData' => $tableData,
            ]
        );
    }
}
