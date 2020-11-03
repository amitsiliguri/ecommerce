<x-Frontend.Layouts.checkout-layout>
    <div 
        class="flex flex-col lg:flex-row max-w-screen-xl xl:mx-auto md:mx-2 my-4"
        x-data="checkout()"
        x-init="() => { 
            getInitializeData()
            $watch('selected_shipping_address_id', value => {
                updateShippingAddressOnSelect()
            })
            $watch('selected_billing_address_id', value => {
                updateBillingAddressOnSelect(is_shipping_billing_same)
            }) 
            $watch('is_shipping_billing_same', value => updateBillingAddressOnCheckBoxChange(value))
         }">

        <div class="w-full lg:w-8/12 py-2 px-2 xl:pr-1">
            <div class="border rounded">
                @include('frontend.pages.checkout.components.index.main.shipping-address')
                @include('frontend.pages.checkout.components.index.main.shipping-method')
                @include('frontend.pages.checkout.components.index.main.billing-address')
                @include('frontend.pages.checkout.components.index.main.billing-method')
            </div>
        </div>
        <div class="w-full lg:w-4/12 py-2 px-2 xl:pl-1">
            <div class="border rounded">
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
        </div>
    </div>



    <script>
        function checkout() {
            return {
                addresses : {!! $addresses !!},

                selected_billing_address_id : null,
                selected_shipping_address_id : null,
                is_shipping_billing_same : true,

                default_shipping_address : null,
                default_billing_address : null,
                selected_shipping_address : null,
                selected_billing_address : null,



                addressText(address, type = null){
                    if(address){
                        let text = ''
                        text = address.first_name + ' ' + address.last_name
                        text += (type == "format") ? "<br>" : ", "
                        text += address.address + ", " + address.street +", "+ address.city
                        text += (type == "format") ? "<br>" : ", "
                        if(address.company != ""){
                            text += address.company
                            text += (type == "format") ? "<br>" : ", "
                        }
                        text += address.state +", "+ address.country
                        text += (type == "format") ? "<br>" : ", "
                        text += (type == "format") ? "Zip : " + address.zip + "<br>" : address.zip +", "
                        text += (type == "format") ? "Phone : " + address.phone : address.phone +", "
                        return text
                    }else {
                        return ""
                    }
                },




                getInitializeData(){
                    let shipping_billing_address = _.find(this.addresses, { "type" : 0 })
                    let shipping_address = _.find(this.addresses, { "type" : 1 })
                    let billing_address = _.find(this.addresses, { "type" : 2 })
                    if(shipping_billing_address != undefined){
                        this.selected_shipping_address = shipping_billing_address
                        this.selected_billing_address = shipping_billing_address
                        this.default_shipping_address = shipping_billing_address
                        this.default_billing_address = shipping_billing_address
                    }else {
                        if(shipping_address != undefined){
                            this.selected_shipping_address = shipping_address
                            this.default_shipping_address = shipping_address
                            if(this.is_shipping_billing_same){
                                this.selected_billing_address = shipping_address
                            }
                        }
                        if(billing_address != undefined){
                            this.default_billing_address = billing_address
                            if(!this.is_shipping_billing_same){
                                this.selected_billing_address = billing_address
                            }
                        }
                    }
                    this.selected_shipping_address_id = this.selected_shipping_address.id
                    this.selected_billing_address_id = this.selected_billing_address.id
                },




                updateBillingAddressOnShippingAddressChange(flag, is_checkbox_clicked = false) {
                    if(flag) {
                        this.selected_billing_address = this.selected_shipping_address
                        this.selected_billing_address_id = this.selected_billing_address.id
                    } else if (is_checkbox_clicked){
                        this.selected_billing_address = this.default_billing_address
                        this.selected_billing_address_id = this.selected_billing_address.id
                    }
                },




                updateBillingAddressOnCheckBoxChange(value) {
                    this.updateBillingAddressOnShippingAddressChange(value , true)
                },




                updateBillingAddressOnSelect(flag) {
                    if (!flag) {
                        let id = parseInt(this.selected_billing_address_id)
                        this.selected_billing_address = _.find(this.addresses, { "id" : id })
                    }
                },




                updateShippingAddressOnSelect() {
                    let id = parseInt(this.selected_shipping_address_id)
                    this.selected_shipping_address = _.find(this.addresses, { "id" : id })
                    this.updateBillingAddressOnShippingAddressChange(this.is_shipping_billing_same)
                },



            }
        }
    </script>
</x-Frontend.Layouts.checkout-layout>

