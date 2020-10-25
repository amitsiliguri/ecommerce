<x-Frontend.Layouts.three-columns>
    <x-slot name="sidebarMain">
       
    </x-slot>
    @php
        $headers = array (
            array(
                "name"=>"Order",
                "key"=>"order_id",
            ),
            array(
                "name"=>"Date",
                "key"=>"created_at",
            ),
            array(
                "name"=>"Ship to",
                "key"=>"shipping_address_name",
            ),
            array(
                "name"=>"Order Total",
                "key"=>"order_total",
            ),
            array(
                "name"=>"Status",
                "key"=>"order_status",
            ),
            array(
                "name"=>"Action",
                "key"=>"action",
            ),
        );
        $tableData = array (
            array(
                "order_id" => "SF0001",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
            ),
            array(
                "order_id" => "SF0002",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
            ),
            array(
                "order_id" => "SF0001",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
            ),
            array(
                "order_id" => "SF0002",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
            ),
            array(
                "order_id" => "SF0001",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
            ),
            array(
                "order_id" => "SF0002",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
            ),
            array(
                "order_id" => "SF0001",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
            ),
            array(
                "order_id" => "SF0002",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
            ),
            array(
                "order_id" => "SF0001",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
            ),
            array(
                "order_id" => "SF0002",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
            ),
            array(
                "order_id" => "SF0001",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
            ),
            array(
                "order_id" => "SF0002",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
            ),
            array(
                "order_id" => "SF0001",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2500",
                "order_status" => "Processing",
            ),
            array(
                "order_id" => "SF0002",
                "created_at" => "12/12/2020",
                "shipping_address_name" => "Amit Biswas",
                "order_total" => "2000",
                "order_status" => "Complete",
            ),
        );

        $actionColumn = array (
            array(
                "name" => "View",
                "url" => "#",
                "type" => "get",
            ),
            array(
                "name" => "Reorder",
                "url" => "#",
                "type" => "post",
            ),
        );
    @endphp




    <x-Frontend.Layouts.Components.table :headers="$headers" :tableData="$tableData" :actionColumn="$actionColumn">
        <x-slot name="col_group">
            <div class="hidden md:table-column-group">
                <span class="table-column w-2/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-2/12"></span>
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