<x-Frontend.Layouts.one-column-full-width>
    <div class="flex flex-col md:flex-row flex-warp max-w-screen-xl xl:mx-auto md:mx-2">
        
        <div class="w-full md:w-5/12 pt-4 px-3 md:pl-0">
            @if ( count($product->images) > 0)
                @foreach ($product->images as $image)
                    @if ($image->type == 2)
                        <img src="{{$image->image}}" alt="{{$product->title}}" class="w-full border">
                    @endif
                @endforeach
            @endif
        </div>
        
        <div class="w-full md:w-7/12 pt-4 px-3 md:pr-0 flex flex-col">
            <h1 class="md:text-5xl text-2xl mb-1 md:order-1">{{ $product->title }}</h1>
            <p class="text-gray-500 mb-4 md:order-2"> SKU: {{ $product->sku }}</p>
            <div class="md:order-5 mb-4 md:w-3/4 p-2 bg-gray-600 items-center shadow-md text-gray-100 leading-none md:rounded-full flex lg:inline-flex" role="alert">
                <span class="mdi mdi-hand flex rounded-full bg-gray-500 uppercase px-3 py-1 text-xs font-bold mr-3"></span>
                <span class="font-semibold mr-2 text-left flex-auto">Check shipping availability before add to cart.</span>
                <span class="mdi mdi-chevron-right text-xl"></span>
            </div>
            <x-Frontend.Catalog.Product.Prices :prices="$product->prices" componentClass=" md:order-4"/>
            <form action="#" method="post" class="mb-4 w-full md:w-64 flex items-center border md:order-6">
                <input type="number" class="w-full appearance-none bg-transparent border-none text-gray-700 py-1 px-2 leading-tight focus:outline-none" value="1">
                <button type="submit" class="bg-gray-100 hover:bg-gray-200 py-1 px-3 text-teal-500 hover:text-teal-800 text-sm focus:outline-none border-l">
                    <span class="mdi mdi-cart-outline text-xl"></span>
                </button>
                <button type="button" class="bg-gray-100 hover:bg-gray-200 py-1 px-3 text-teal-500 hover:text-teal-800 text-sm focus:outline-none border-l">
                    <span class="mdi mdi-heart-outline text-xl"></span>
                </button>
            </form>
            <p class="text-justify pb-4 mb-4 border-b  md:order-3">{{ $product->small_description}}</p>
        </div>
    </div>


    <div class="flex flex-col md:flex-row flex-warp max-w-screen-xl xl:mx-auto md:mx-2 py-4 px-3 md:px-0">
        
        <div x-data="{ tab: 'description' }" class="w-full tab flex flex-col md:flex-row flex-wrap">
            <button :class="{ 'border active-button': tab === 'description', 'bg-gray-100  md:border-b' : tab != 'description' }" @click="tab = 'description'" class="px-4 py-3 focus:outline-none md:z-10 order-1 md:order-1 mb-4 md:mb-0">Description</button>
            <button :class="{ 'border active-button': tab === 'reviews', 'bg-gray-100 md:border-b' : tab != 'reviews' }" @click="tab = 'reviews'" class="px-4 py-3 focus:outline-none md:z-10 order-3 md:order-2 mb-4 md:mb-0">Reviews</button>

            <div x-show="tab === 'description'" class="w-full text-justify border px-3 py-3 margin-top--1 order-2 md:order-3 mb-4 md:mb-0">
                {{ $product->description}}
            </div>
            <div x-show="tab === 'reviews'" class="w-full text-justify border px-3 py-3 margin-top--1 order-4 md:order-4 mb-4 md:mb-0">
                Review
            </div>
        </div>
        
    </div>





    <x-slot name="jsscript">
        <script>
            
        </script>
    </x-slot>
</x-Frontend.Layouts.one-column-full-width>