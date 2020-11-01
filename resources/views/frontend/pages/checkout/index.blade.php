<x-Frontend.Layouts.checkout-layout>
    <div class="border rounded" x-data='{
            addresses : {!! $addresses !!},

            default_shipping_address_id : null,
            default_billing_address_id : null,

            selected_shipping_address_id : null,
            selected_billing_address_id : null,

            is_shipping_billing_same : true,

            addressText(address){
                let text = ""
                text = address.first_name + " " + address.last_name + ", "
                if(address.company != ""){
                    text += address.company + ", "
                }
                text += address.address + ", " + address.street +", "+ address.city +", "+ address.state +", "+ address.country +", "+ address.zip +", "+ address.phone
                return text
            },
            getInitializeData(){
                let shipping_billing_address_id = _.find(this.addresses, { "type" : 0 })
                let shipping_address_id = _.find(this.addresses, { "type" : 1 })
                let billing_address_id = _.find(this.addresses, { "type" : 2 })

                if(shipping_billing_address_id != undefined){
                    this.selected_shipping_address_id = shipping_billing_address_id.id
                    this.selected_billing_address_id = shipping_billing_address_id.id

                    this.default_shipping_address_id = shipping_billing_address_id.id
                    this.default_billing_address_id = shipping_billing_address_id.id
                }else {
                    if(shipping_address_id != undefined){
                        this.selected_shipping_address_id = shipping_address_id.id
                        this.default_shipping_address_id = shipping_address_id.id

                        if(this.is_shipping_billing_same){
                            this.selected_billing_address_id = shipping_address_id.id
                        }
                    }
                    if(billing_address_id != undefined){
                        this.default_billing_address_id = billing_address_id.id
                        if(!this.is_shipping_billing_same){
                            this.selected_billing_address_id = billing_address_id.id
                        }
                    }
                }
            },
            updateBillingAddress(flag){
                if(flag == true) {
                    this.selected_billing_address_id = this.selected_shipping_address_id
                } else {
                    this.selected_billing_address_id = this.default_billing_address_id
                }
            }
        }'
        x-init="() => { 
            getInitializeData()
            $watch('selected_shipping_address', value => {
                console.log(value)
            })
            $watch('selected_billing_address', value => {
                console.log(value)
            }) 
            $watch('is_shipping_billing_same', value => updateBillingAddress(value))
         }">
        @include('frontend.pages.checkout.components.index.main.shipping-address')
        @include('frontend.pages.checkout.components.index.main.shipping-method')
        @include('frontend.pages.checkout.components.index.main.billing-address')
        @include('frontend.pages.checkout.components.index.main.billing-method')
    </div>

    <x-slot name="checkoutSideBar">
        <div class="border rounded" x-data>
            @include('frontend.pages.checkout.components.index.sidebar.items')
            @include('frontend.pages.checkout.components.index.sidebar.coupon')
            @include('frontend.pages.checkout.components.index.sidebar.shipping-address')
            @include('frontend.pages.checkout.components.index.sidebar.shipping-method')
            @include('frontend.pages.checkout.components.index.sidebar.billing-address')
            @include('frontend.pages.checkout.components.index.sidebar.billing-method')
            @include('frontend.pages.checkout.components.index.sidebar.summary')
            <button class="w-full px-2 py-2 mt-2 bg-gray-100 hover:bg-gray-200">
                Place Order
            </button>
        </div>
    </x-slot>

</x-Frontend.Layouts.checkout-layout>