<div class="head bg-gray-100 flex px-2 py-2">
    <h3 class="text-lg">Shipping Method</h3>
</div>

<div class="w-full px-2 py-2">
    <template x-if="selected_shipping_method">
        <span x-text="selected_shipping_method.label"></span>
    </template>
    <template x-if="!selected_shipping_method">
        <span>Shipping Method not selected</span>
    </template>
</div>