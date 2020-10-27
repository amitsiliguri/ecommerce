<x-Frontend.Layouts.three-columns>

    <x-Frontend.Layouts.Components.table 
        templatePath="frontend.pages.customer.account.components.ordertable"
        tableName="Order History" 
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