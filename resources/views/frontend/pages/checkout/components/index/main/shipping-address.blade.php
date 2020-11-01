<div class="head bg-gray-100 flex px-2 py-2">
    <h3 class="text-2xl">Shipping Address</h3>
</div>
<div class="body px-2 py-2">
    <template x-if="addresses.length > 0">
        <div class="inline-block relative ml-2">
            <select x-model="selected_shipping_address_id" name="selected_shipping_address" id="checkout_shipping_address" class="cursor-pointer block appearance-none w-full bg-white border hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                <template x-for="(address,index) in addresses" :key="index">
                    <option :value="address.id" x-text="addressText(address)"></option>
                </template>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <span class="mdi mdi-chevron-down"></span>
            </div>
        </div>
    </template>
</div>