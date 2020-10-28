<x-Frontend.Layouts.Components.right-side-navigation triggericon="mdi-cart-outline">
    @auth('customer')
        <a href="{{route('checkout.index') }}">Proceed to checkout</a>
    @else
        <a href="{{route('checkout.account') }}">Proceed to checkout</a>
    @endif
</x-Frontend.Layouts.Components.right-side-navigation>
