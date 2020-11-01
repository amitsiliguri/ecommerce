<x-Frontend.Layouts.Components.Modal id="address" :isModalOpen="false" :isParsistant="true">
    <form 
        x-data="{
            formData:{
                id : null,
                first_name : '',
                last_name : '',
                company : '',
                phone: '',
                address : '',
                street : '',
                land_mark : '',
                address_type : '',
                country : '',
                state : '',
                city : '',
                zip :'',
                type : 3
            },
            updateFormData(ev){
                this.formData.id            = ev.id
                this.formData.first_name    = ev.first_name
                this.formData.last_name     = ev.last_name
                this.formData.company       = ev.company
                this.formData.phone         = ev.phone
                this.formData.address       = ev.address
                this.formData.street        = ev.street
                this.formData.land_mark     = ev.land_mark
                this.formData.address_type  = ev.address_type
                this.formData.country       = ev.country
                this.formData.state         = ev.state
                this.formData.city          = ev.city
                this.formData.zip           = ev.zip
                this.formData.type          = ev.type
            },
            submit(event , dispatch) {
                event.preventDefault()
                dispatch('addressclose')
            },
        }"
        x-on:update-address-form.window="updateFormData($event.detail.address)"
        action="#"
        method="post"
        @submit="submit(event, $dispatch)"
        class="rounded border border-gray-100 w-full">

            <div class="py-2 px-2 md:px-3 bg-gray-100">
                <template x-if="formData.id == null">
                    <h3 class="text-xl">New Address</h3>
                </template>

                <template x-if="formData.id != null">
                    <h3 class="text-xl">Edit Address</h3>
                </template>
                
            </div>
            <div class="overflow-y-auto py-2 px-2" style="max-height: 500px">

                <div class="flex flex-col md:flex-row flex-wrap">
                    
                    
                    <div class="input-group w-full md:w-1/2 md:pr-1 mb-3">
                        <span class="text-sm">First Name *</span>
                        <input type="text" name="first_name" x-model="formData.first_name" placeholder="First Name" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
                    
                    <div class="input-group w-full md:w-1/2 md:pl-1 mb-3">
                        <span class="text-sm">Last Name *</span>
                        <input type="text" name="last_name" x-model="formData.last_name" placeholder="Last Name"class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
    
    
    
    
                    <div class="input-group w-full md:w-1/2 md:pr-1 mb-3">
                        <span class="text-sm">Company</span>
                        <input type="text" name="company" x-model="formData.company" placeholder="Company, Shop, Organisation" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
    
                    <div class="input-group w-full md:w-1/2 md:pl-1 mb-3">
                        <span class="text-sm">Phone *</span>
                        <input type="tel" name="phone" x-model="formData.phone" placeholder="Contact number" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
    
    
    
    
                    <div class="input-group w-full mb-3">
                        <span class="text-sm">Address *</span>
                        <input type="text" name="address" x-model="formData.address" placeholder="House name, House number, Apartment name, flat number, floor" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
    
                    <div class="input-group w-full md:w-1/2 md:pr-1 mb-3">
                        <span class="text-sm">Street *</span>
                        <input type="text" name="street" x-model="formData.street" placeholder="Street name, colony etc" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
    
                    <div class="input-group w-full md:w-1/4 md:pl-1 md:pr-1 mb-3">
                        <span class="text-sm">Land Mark</span>
                        <input type="text" name="land_mark" x-model="formData.land_mark" placeholder="Land mark near you" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
                    <div class="input-group w-full md:w-1/4 md:pl-1 mb-3">
                        <span class="text-sm">Address Type</span>
                        <select name="address_type" id="address_type" x-model="formData.address_type" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                            <option value="residential" selected>Residential</option>
                            <option value="residential">Business</option>
                        </select>
                    </div>
    
                    
    
    
    
                    <div class="input-group w-full md:w-1/4 md:pr-1 mb-3">
                        <span class="text-sm">Country *</span>
                        <select name="country" id="country" x-model="formData.country" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                            <option value="India" selected>India</option>
                        </select>
                    </div>
    
                    <div class="input-group w-full md:w-1/4 md:pl-1 md:pr-1 mb-3">
                        <span class="text-sm">State *</span>
                        <select name="state" id="state" x-model="formData.state" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                            <option value="West Bengal" selected>West Bengal</option>
                            <option value="Sikkim">Sikkim</option>
                        </select>
                    </div>
    
                    <div class="input-group w-full md:w-1/4 md:pl-1 md:pr-1 mb-3">
                        <span class="text-sm">City *</span>
                        <input type="text" name="city" x-model="formData.city" placeholder="City, town, village" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
    
                    <div class="input-group w-full md:w-1/4 md:pr-1 mb-3">
                        <span class="text-sm">Zip *</span>
                        <input type="number" name="zip" x-model="formData.zip" placeholder="Post code" class="border border-gray-300 rounded px-1 py-1 my-1 w-full focus:outline-none">
                    </div>
    
    
                </div>
            </div>
            
            <div class="py-2 px-2 md:px-3 bg-gray-100">
                <button type="submit" class="px-4 py-1 border border-gray-400 rounded focus:outline-none" >Save</button>
            </div>
    </form>

</x-Frontend.Layouts.Components.Modal>