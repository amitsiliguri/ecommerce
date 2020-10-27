<div class="flex flex-row flex-wrap">
    <template x-if="products.data.length > 0" >
        <template x-for="(product, index) in products.data" :key="index">
            <div class="w-6/12 md:w-3/12 sm:px-1 sm:py-1">
                <div class="sm:rounded overflow-hidden sm:shadow-md bg-white px-1 py-1 sm:px-2 sm:py-2 h-full flex flex-col">
                    <template x-if="product.images.length > 0">
                        <template x-for="(image, index) in product.images" :key="index">
                            <a :href="productUrl(product.slug)">
                                <img :src="image.image" class="w-full my-4">
                            </a>
                        </template>
                    </template>
                    <p class="text-center my-3" x-text="product.title"></p>
                    <template x-if="product.prices.length > 0">
                        <table class="table-auto w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="border py-2 text-center bg-gray-100">Quantity</th>
                                    <th class="border py-2 text-center bg-gray-100">Unit Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(price, index) in product.prices" :key="index">
                                    <tr>
                                        <td class="border py-2 text-center">
                                            <span x-text="price.quantity"></span>
                                        </td>
                                        <td class="border py-2 text-center" x-html="isSpecialPrice(price)"></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>    
                    </template>
                    <div class="flex-grow"></div>

                    <div class="w-full flex items-center border rounded mt-3">

                        <button class="bg-gray-100 hover:bg-gray-200 py-2 rounded-l w-1/4 focus:outline-none">
                            <span class="mdi mdi-heart-outline cursor-pointer"></span>
                        </button>

                        <input type="number" min="1" class="text-center w-2/4 px-1 py-2 border-none focus:outline-none" value="1">   
                        
                        <button class="bg-gray-100 hover:bg-gray-200 py-2 flex-grow-1 rounded-r w-1/4 focus:outline-none">
                            <span class="mdi mdi-cart-outline cursor-pointer"></span>
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </template>

    <template x-if="products.data.length == 0">
        <div class="w-full sm:px-1 sm:py-1">
            No products
        </div>
    </template>
</div>
