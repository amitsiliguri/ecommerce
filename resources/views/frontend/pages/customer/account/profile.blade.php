<x-Frontend.Layouts.three-columns>
    
    <div class="flex flex-col md:flex-row flex-warp items-baseline">
        <form action="#" method="post" class="flex flex-col md:flex-row flex-warp mb-4 w-full md:w-1/2 md:mr-1">
            <div class="rounded overflow-hidden border border-gray-100 w-full">
                <div class="py-2 px-2 md:px-3 bg-gray-100">
                    <h3 class="text-xl">Profile Informations</h3>
                </div>
                <div class="py-2 px-2 md:px-3">
                    <input type="text" name="name" id="name" class="border border-gray-100 w-full my-1 px-1 py-2 rounded focus:outline-none" placeholder="First Name">
                    <input type="text" name="name" id="name" class="border border-gray-100 w-full my-1 px-1 py-2 rounded focus:outline-none" placeholder="Last Name">
                    <input type="email" name="email" id="email" class="border border-gray-100 w-full my-1 px-1 py-2 rounded focus:outline-none" placeholder="Email">
                </div>
                <div class="py-2 px-2 md:px-3 border-t border-gray-100">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded">Save</button>
                </div>
            </div>
        </form>
        
    
        <form action="#" method="post" class="flex flex-col md:flex-row flex-warp mb-4 w-full md:w-1/2 md:mr-1">
            <div class="rounded overflow-hidden border border-gray-100 w-full">
                <div class="py-2 px-2 md:px-3 bg-gray-100">
                    <h3 class="text-xl">Update Password</h3>
                </div>
                <div class="py-2 px-2 md:px-3">
                    <input type="text" name="name" id="name" class="border border-gray-100 w-full my-1 px-1 py-2 rounded focus:outline-none" placeholder="Current Password">
                    <input type="email" name="email" id="email" class="border border-gray-100 w-full my-1 px-1 py-2 rounded focus:outline-none" placeholder="New Password">
                    <input type="text" name="name" id="name" class="border border-gray-100 w-full my-1 px-1 py-2 rounded focus:outline-none" placeholder="Confirm Password">
                </div>
                <div class="py-2 px-2 md:px-3 border-t border-gray-100">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded">Save</button>
                </div>
            </div>
        </form>
    </div>

    
    





    <x-slot name="sidebarMain">
        @include('frontend.pages.customer.account.components.links')
    </x-slot>
    
    <x-slot name="sidebarAdditional">
       <img src="/asset/account/addtional_side_bar.png" class="w-full rounded" alt="account sidebar additional">
    </x-slot>

    <x-slot name="jsscript"></x-slot>
    
</x-Frontend.Layouts.three-columns>