<x-Frontend.Layouts.three-columns>
    
    <div class="flex flex-row flex-warp justify-between items-center border-b border-gray-100 mb-4">
        <h1 class="text-3xl">Addresses</h1>
        @include('frontend.pages.customer.account.components.addresses.new')
    </div>

    <div class="flex flex-col md:flex-row flex-warp">
        <div class="rounded overflow-hidden border border-gray-100 mb-4 w-full md:w-1/2 md:mr-1">
            <div class="py-2 px-2 md:px-3 bg-gray-100">
                <h3 class="text-xl">Default Shipping Address</h3>
            </div>
            <div class="py-2 px-2 md:px-3">
                Amit Biswas <br>
                amit_biswas@yahoo.com <br>
                9475585924
            </div>
        </div>
        <div class="rounded overflow-hidden border border-gray-100 mb-4 w-full md:w-1/2 md:ml-1">
            <div class="py-2 px-2 md:px-3 bg-gray-100">
                <h3 class="text-xl">Default Billing Address</h3>
            </div>
            <div class="py-2 px-2 md:px-3">
                Amit Biswas <br>
                amit_biswas@yahoo.com <br>
                9475585924
            </div>
        </div>
    </div>

    <h1 class="text-2xl border-b border-gray-100 mb-4">Additional Addresses</h1>





    <x-slot name="sidebarMain">
        @include('frontend.pages.customer.account.components.links')
    </x-slot>
    
    <x-slot name="sidebarAdditional">
       <img src="/asset/account/addtional_side_bar.png" class="w-full rounded" alt="account sidebar additional">
    </x-slot>

    <x-slot name="jsscript"></x-slot>
    
</x-Frontend.Layouts.three-columns>