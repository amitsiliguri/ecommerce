<div class="head bg-gray-100 px-2 py-2">
    <h3 class="text-2xl">Shipping Methods</h3>
</div>
<div class="body px-2 py-2 flex">
    <table class="w-full">
        <colgroup>
            <col class="w-12">
            <col class="w-64">
            <col class="w-24">
            <col>
        </colgroup>
        <tbody>
            <tr>
                <td class="px-2 py-2">
                    <input type="radio" name="checkout_shipping_method" id="checkout_shipping_method_fixed_rate">
                </td>
                <td class="px-2 py-2">
                    <label for="checkout_shipping_method_fixed_rate">Fixed rate</label>
                </td>
                <td class="px-2 py-2">
                    <label for="checkout_shipping_method_fixed_rate">10</label>
                </td>
                <td class="px-2 py-2"></td>
            </tr>
            <tr>
                <td class="px-2 py-2">
                    <input type="radio" name="checkout_shipping_method" id="checkout_shipping_method_self_collect">
                </td>
                <td class="px-2 py-2">
                    <label for="checkout_shipping_method_self_collect">Self Collect</label>
                </td>
                <td class="px-2 py-2">
                    <label for="checkout_shipping_method_self_collect">0</label>
                </td>
                <td class="px-2 py-2">
                    <div class="inline-block relative w-full">
                        <select name="checkout_shipping_address" id="checkout_shipping_address" class="cursor-pointer block appearance-none w-full bg-white border hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                            <option disabled selected>Pick Up Location</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <span class="mdi mdi-chevron-down"></span>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>