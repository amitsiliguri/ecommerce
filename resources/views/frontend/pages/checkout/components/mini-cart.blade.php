<x-Frontend.Layouts.Components.right-side-navigation triggericon="mdi-cart-outline">
    <h3>{{ __('Cart Items') }}</h3>
    <x-Frontend.Checkout.Cart.cart-items/>
    <div>
        <table class="w-full my-2">
            <tbody>
                <tr class="bg-gray-100">
                    <td class="py-2 pl-1">Shipping Location Zip Code</td>
                    <td class="py-2 pr-1"><input class="w-full focus:outline-none px-1" type="number" min="0" max="6" name="mini_cart_shipping_zip" id="mini_cart_shipping_zip" placeholder="Zip"></td>
                </tr>
                <tr class="py-2">
                    <td class="py-2 pl-1">Estimated Tax</td>
                    <td class="py-2 pr-1 text-right">99</td>
                </tr>
                <tr class="bg-gray-100 py-2">
                    <td class="py-2 pl-1">Cart total</td>
                    <td class="py-2 pr-1 text-right">9999</td>
                </tr>
            </tbody>
        </table>
        @auth('customer')
            <a href="{{route('checkout.index') }}" class="block text-center bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Proceed to checkout</a>
        @else
            <a href="{{route('checkout.account') }}" class="block text-center bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Proceed to checkout</a>
        @endif
    </div>
</x-Frontend.Layouts.Components.right-side-navigation>