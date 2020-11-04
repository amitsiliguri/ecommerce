<div class="head bg-gray-100 flex px-2 py-2">
    <h3 class="text-lg">Order Items</h3>
</div>

<div class="h-64 overflow-y-auto">
    <table>
        <tbody>
            <template x-for="i in 4">
                <tr>
                    <td class="px-2 py-2"><img src="/asset/catalog/product/0/noImage.png" alt="product image" width="87px"></td>
                    <td class="px-2 py-2">
                        <h5>Product Title</h5>
                        <span class="text-sm">SKU : #jw2e3</span> <br>
                        <span class="text-sm">Qty : 10</span>, <span class="text-sm">Unit Price : ₹ 333</span> <br>
                        <span class="attribute_key text-sm">Color</span> : <span class="attribute_value text-sm">White</span>, 
                        <span class="attribute_key text-sm">Size</span> : <span class="attribute_value text-sm">XL</span>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</div>
