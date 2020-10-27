<x-Frontend.Layouts.three-columns>
    
    <h1 class="text-3xl border-b border-gray-100 mb-4">Hi Amit Biswas</h1>


    <div class="flex flex-col md:flex-row flex-warp">
        <div class="rounded overflow-hidden border border-gray-100 mb-4 w-full md:w-1/2 md:mr-1">
            <div class="py-2 px-2 md:px-3 bg-gray-100">
                <h3 class="text-xl">Contact Information</h3>
            </div>
            <div class="py-2 px-2 md:px-3">
                Amit Biswas <br>
                amit_biswas@yahoo.com <br>
                9475585924
            </div>
        </div>

        <div class="rounded overflow-hidden border border-gray-100 mb-4 w-full md:w-1/2 md:ml-1">
            <div class="py-2 px-2 md:px-3 bg-gray-100">
                <h3 class="text-xl">Newsletter</h3>
            </div>
            <div class="py-2 px-2 md:px-3">
                You have subscribed to newsletter.
            </div>
        </div>
    </div>




    <div class="flex flex-col md:flex-row flex-warp">
        <div class="rounded overflow-hidden border border-gray-100 mb-4 w-full md:w-1/2 md:mr-1">
            <div class="py-2 px-2 md:px-3 bg-gray-100">
                <h3 class="text-xl">Default Shipping Address</h3>
            </div>
            <div class="py-2 px-2 md:px-3">
                Amit Biswas <br>
                Biswas House, word-no 35, Bhaktinagar, <br>
                Siliguri, Darjeeling, West Bengal, <br>
                India, 734007 <br>
                9475585924
            </div>
        </div>

        <div class="rounded overflow-hidden border border-gray-100 mb-4 w-full md:w-1/2 md:ml-1">
            <div class="py-2 px-2 md:px-3 bg-gray-100">
                <h3 class="text-xl">Default Billing Address</h3>
            </div>
            <div class="py-2 px-2 md:px-3">
                Amit Biswas <br>
                Biswas House, word-no 35, Bhaktinagar, <br>
                Siliguri, Darjeeling, West Bengal, <br>
                India, 734007 <br>
                9475585924
            </div>
        </div>
    </div>


    <x-Frontend.Layouts.Components.table 
        templatePath="frontend.pages.customer.account.components.ordertable"
        tableName="Recent Orders" 
        :headers="$headers" 
        :tableData="$tableData">
        <x-slot name="col_group">
            <div class="hidden md:table-column-group">
                <span class="table-column w-1/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-2/12"></span>
                <span class="table-column w-1/12"></span>
                <span class="table-column w-2/12"></span>
            </div>
        </x-slot>
    </x-Frontend.Layouts.Components.table>







    <x-slot name="sidebarMain">
        @include('frontend.pages.customer.account.components.links')
     </x-slot>
    
    <x-slot name="sidebarAdditional">
       <img src="/asset/account/addtional_side_bar.png" class="w-full rounded" alt="account sidebar additional">
    </x-slot>

    <x-slot name="jsscript"></x-slot>
    
</x-Frontend.Layouts.three-columns>