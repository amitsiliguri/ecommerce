<div class="flex-grow overflow-y-auto">
    
    <table class="w-full " x-data="">
        <colgroup>
            <col class="w-24">
            <col>
        </colgroup>
        <tbody>
            <template x-for="i in 10">
                <tr class="border-t">
                    <td class="py-2 pr-2">
                        <img src="/asset/catalog/product/0/noImage.png" alt="product image" width="87px">
                    </td>
                    <td class="py-2 flex flex-col" x-data="{isOptionOpen: false}">
                        <h4>Product Title</h4>
                        <span class="text-sm">₹ 333</span>
                        <span class="text-sm cursor-pointer" @click="isOptionOpen = !isOptionOpen">Option</span>
                        
                        <p class="text-sm" x-show="isOptionOpen">
                            <span class="attribute_key">Color</span> : <span class="attribute_value">White</span>, 
                            <span class="attribute_key">Size</span> : <span class="attribute_value">XL</span>
                        </p>
                        <form action="#" method="post" class="flex flex-row mt-1">
                            <input type="number" name="" class="w-24 mr-2 border border-gray-400 focus:outline-none pl-1">
                            <button type="submit" class="mx-2 text-gray-400 hover:text-gray-800 focus:outline-none ">
                                <span class="mdi mdi-checkbox-marked-circle-outline"></span>
                            </button>
                            <button type="button" class="ml-2 text-gray-400 hover:text-gray-800 focus:outline-none">
                                <span class="mdi mdi-delete-outline"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</div>

