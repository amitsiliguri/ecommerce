<x-Frontend.Layouts.three-columns>
    Profile
    <x-slot name="sidebarMain">
        @include('frontend.pages.customer.account.components.links')
    </x-slot>
    
    <x-slot name="sidebarAdditional">
       <img src="/asset/account/addtional_side_bar.png" class="w-full rounded" alt="account sidebar additional">
    </x-slot>

    <x-slot name="jsscript"></x-slot>
    
</x-Frontend.Layouts.three-columns>