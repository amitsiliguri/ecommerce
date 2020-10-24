@include('frontend.pages.catalog.category.components..pagination')

<div class="flex flex-row flex-wrap" >
    <template x-if="products.data.length > 0" x-for="(product, index) in products.data" :key="index">
        <div class="w-6/12 md:w-3/12 sm:px-1 sm:py-1">
            <div class="sm:rounded overflow-hidden sm:shadow-md bg-white px-1 py-1 sm:px-2 sm:py-2 h-full flex flex-col">
                <template x-if="product.images.length > 0">
                    <template x-for="(image, index) in product.images" :key="index">
                        <img :src="image.image" class="w-full my-4">
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
                                    <td class="border py-2 text-center" x-html="isSpecialPrice(price)">
                                        {{-- <template x-if="isSpecialPrice(price)">
                                            <span class="text-gray-400 line-through" x-text="price.base_price"></span>
                                            <span x-text="price.special_price"></span>
                                        </template> --}}
                                        
                                        
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>    
                </template>





                <div class="flex-grow"></div>
                <div class="inline-flex mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-l flex-grow">
                        <span class="mdi mdi-heart-outline cursor-pointer"></span>
                    </button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 flex-grow">
                        <span class="mdi mdi-cart-outline cursor-pointer"></span>
                    </button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-r flex-grow">
                        <span class="mdi mdi-magnify cursor-pointer"></span>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
    
@include('frontend.pages.catalog.category.components..pagination')
