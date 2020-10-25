<table {{ $attributes->merge(['class' => 'table-auto text-sm md:w-64 w-full mb-4 '.$_class]) }}>
    <thead>
        <tr>
            <th class="border py-2 text-center bg-gray-100">Quantity</th>
            <th class="border py-2 text-center bg-gray-100">Unit Price</th>
        </tr>
    </thead>
    <tbody>
            @if (sizeof($_prices) > 0)
                @foreach ($_prices as $price)
                    <tr>
                        <td class="border py-2 text-center">{{$price->quantity}}</td>
                        <td class="border py-2 text-center">
                            @if ($isSpecialPriceActive($price))
                                <span class="text-gray-400 line-through">{{$price->base_price}}</span>
                                <span>{{$price->special_price}}</span>
                            @else
                                <span>{{$price->base_price}}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif        
    </tbody>
</table> 