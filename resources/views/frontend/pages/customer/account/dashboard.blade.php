<x-Frontend.Layouts.three-columns>
    <x-slot name="sidebarMain">
       side bar
    </x-slot>
    @php
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
                "name"=>"PDF",
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
        );
    @endphp




    <x-Frontend.Layouts.Components.table 
        templatePath="frontend.pages.customer.account.components.ordertable"
        tableName="Order History" 
        :headers="$headers" 
        :tableData="$tableData" >

        <x-slot name="col_group">
            <div class="hidden md:table-column-group">
                <span class="table-column w-1/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-4/12"></span>
                <span class="table-column w-1/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-1/12"></span>
                <span class="table-column w-1/12"></span>
            </div>
        </x-slot>

    </x-Frontend.Layouts.Components.table>



    
    <x-slot name="sidebarAdditional">
       side bar additional slot
    </x-slot>

    <x-slot name="jsscript">
        <script>
        </script>
    </x-slot>
    
</x-Frontend.Layouts.three-columns>