<div class="head bg-gray-100 px-2 py-2">
    <h3 class="text-2xl">Billing Methods</h3>
</div>

<template x-if="available_billing_methods.length > 0">
    <div class="body px-2 py-2 flex">
        <table class="w-full">
            <colgroup>
                <col class="w-12">
                <col class="w-64">
                <col class="w-24">
                <col>
            </colgroup>
            <tbody>
                <template x-for="(available_billing_method,index) in available_billing_methods" :key="index">
                    <tr>
                        <td class="px-2 py-2">
                            <input type="radio" name="checkout_billing_method" @change="getSelectedBillingMethod(available_billing_method)" :id="available_billing_method.code" :value="available_billing_method.code">
                        </td>
                        <td class="px-2 py-2">
                            <label :for="available_billing_method.code" x-text="available_billing_method.label"></label>
                        </td>
                        <td class="px-2 py-2">
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

