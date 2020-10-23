<div class="w-6/12 md:w-3/12 sm:px-1 sm:py-1">
    <div class="sm:rounded overflow-hidden sm:shadow-md bg-white px-1 py-1 sm:px-2 sm:py-2 h-full flex flex-col">
        @foreach ($product->images as $image)
            <img src="{{$image->image}}" alt="{{$product->title }}" class="w-full my-4">
        @endforeach
        
        <p class="text-center my-3">{{$product->title }}</p>
        
        <table class="table-auto w-full text-sm">
            <thead>
                <tr>
                    <th class="border py-2 text-center bg-gray-100">Quantity</th>
                    <th class="border py-2 text-center bg-gray-100">Unit Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->prices as $price)
                    <tr>
                        <td class="border py-2 text-center">{{$price->quantity}}</td>
                        <td class="border py-2 text-center">
                            @if ($price->special_price != null && $price->special_price > 0 && Carbon\Carbon::parse($price->offer_end)->greaterThan(Carbon\Carbon::now()))
                                <span class="text-gray-400 line-through">{{$price->base_price}}</span>
                                <span>{{$price->special_price}}</span>
                            @else 
                                <span>{{$price->base_price}}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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