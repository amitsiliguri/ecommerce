<x-Frontend.Layouts.two-columns-left-side-bar>
    @if ($category->title != '')
        <h1 class="md:text-5xl text-2xl mt-2 md:mt-0">{{$category->title}}</h1>
    @endif
    @if ($category->banner != '')
        <img src="{{$category->banner}}" alt="{{$category->title }}" class="w-full mb-4">
    @endif
    @if ($category->banner != '')
        <p> {{$category->description}} </p>
    @endif


    @if (count($products) > 0 )
        {{$products->links()}}
        <div class="flex flex-row flex-wrap">
            
            @foreach ($products as $product)
                @include('frontend.layouts.components.product-card', ['product' => $product])
            @endforeach
        </div>
        {{$products->links()}}
    @else
        No products added to this category.
    @endif

    
 </x-Frontend.Layouts.two-columns-left-side-bar>
 