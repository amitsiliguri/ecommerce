<x-Frontend.Layouts.three-columns>
    @include('frontend.pages.customer.account.components.address-form')
    <div 
        class="flex flex-row flex-warp justify-between items-center border-b border-gray-100 mb-4" 
        x-data='{
            address:{
                id : null,
                first_name : "Amit",
                last_name : "Biswas",
                company : "",
                phone: "",
                address : "",
                street : "",
                land_mark : "",
                address_type : "",
                country : "",
                state : "",
                city : "",
                zip : "",
                type : 3
            },
            addAddress(dispatch){
                dispatch("update-address-form", { 
                    address : this.address
                })
                dispatch("addressopen")
            }
        }'>
        <h1 class="text-3xl">Addresses</h1>
        <button @click="addAddress($dispatch)" class="px-1 py-1 border border-gray-100 rounded focus:outline-none">
            Add New Address
        </button>
    </div>

    <div 
        class="flex flex-col md:flex-row flex-wrap"
        x-data='{
            addresses : {!! $defaultShippingBilling !!},
            editAddress(id, dispatch) {
                let object = _.find(this.addresses, { "id" : id })
                dispatch("update-address-form", { 
                    address : object
                })
                dispatch("addressopen")
            },
            deleteAddress(id) {}
        }'>
        <template x-if="addresses.length > 0">
            <template x-for="(address, index) in addresses" :key="index" >
                @include('frontend.pages.customer.account.components.address-card')
            </template>
        </template>
    </div>


    <h1 class="text-2xl border-b border-gray-100 mb-4">Aditional Addresses</h1>
    <div 
        class="flex flex-col md:flex-row flex-wrap"
        x-data='{
            addresses : {!! $aditionalAddresses !!},
            editAddress(id, dispatch) {
                let object = _.find(this.addresses, { "id" : id })
                dispatch("update-address-form", { 
                    address : object
                })
                dispatch("addressopen")
            },
            deleteAddress(id) {}
        }'>
        <template x-if="addresses.length > 0">
            <template x-for="(address, index) in addresses" :key="index" >
                @include('frontend.pages.customer.account.components.address-card')
            </template>
        </template>
    </div>







    <x-slot name="sidebarMain">
        @include('frontend.pages.customer.account.components.links')
    </x-slot>
    
    <x-slot name="sidebarAdditional">
       <img src="/asset/account/addtional_side_bar.png" class="w-full rounded" alt="account sidebar additional">
    </x-slot>
    
</x-Frontend.Layouts.three-columns>