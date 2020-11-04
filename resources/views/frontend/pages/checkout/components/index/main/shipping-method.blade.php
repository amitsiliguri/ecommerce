<template x-if="available_shipping_methods != null && available_shipping_methods.length > 0">
    <span>
        <div class="head bg-gray-100 px-2 py-2">
            <h3 class="text-2xl">Shipping Methods</h3>
        </div>
        <div class="body px-2 py-2 flex">
            <table class="w-full">
                <colgroup>
                    <col class="w-12">
                    <col class="w-64">
                    <col>
                </colgroup>
                <tbody>
                    <template x-for="(available_shipping_method,index) in available_shipping_methods" :key="index">
                        <tr>
                            <td class="px-2 py-2">
                                <input type="radio" name="checkout_shipping_method" @change="getSelectedShippingMethod(available_shipping_method)" :id="available_shipping_method.code" :value="available_shipping_method.code">
                            </td>
                            <td class="px-2 py-2">
                                <label :for="available_shipping_method.code" x-text="available_shipping_method.label"></label>
                            </td>
                            <td class="px-2 py-2">
                                <label :for="available_shipping_method.code" x-text="available_shipping_method.price"></label>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </span>
</template>


