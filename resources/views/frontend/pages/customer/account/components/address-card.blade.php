<div class="card-cover mb-4 w-full md:w-1/2 px-1">
    <div class="rounded overflow-hidden border border-gray-100">
        <div class="py-2 px-2 md:px-3 bg-gray-100 flex flex-row flex-warp items-cente">
            <template x-if="address.type === 0">
                <h3 class="text-xl">Default Shipping and Billing Address</h3> 
            </template>
            <template x-if="address.type === 1">
                <h3 class="text-xl">Default Shipping Address</h3> 
            </template>
            <template x-if="address.type === 2">
                <h3 class="text-xl">Default Billing Address</h3> 
            </template>
            <span class="flex-grow"></span>
            <span class="mdi mdi-pencil" @click="editAddress(address.id, $dispatch)"></span>
            <template x-if="address.type === 3">
                <span class="mdi mdi-delete-outline pl-2" @click="deleteAddress(address.id)"></span>
            </template>
        </div>
        <div class="py-2 px-2 md:px-3" >
            <span x-text="address.first_name"></span> <span x-text="address.last_name"></span> <br>
            <span x-text="address.address"></span> <span x-text="address.street"></span> <span x-text="address.land_mark"></span><br>
            <span x-text="address.city"></span> <span x-text="address.state"></span> <span x-text="address.country"></span> <br>
            <span x-text="address.zip"></span> <br>
            <span x-text="address.phone"></span>
        </div>
    </div>
</div>

