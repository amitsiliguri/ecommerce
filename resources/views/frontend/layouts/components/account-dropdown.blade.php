<x-jet-dropdown align="right" width="48">
    <x-slot name="trigger">
        <span class="mdi mdi-account text-teal-500 text-3xl md:text-2xl cursor-pointer"></span>
    </x-slot>
    <x-slot name="content">
        @auth('customer')
            <x-jet-dropdown-link href="{{  route('customer.account.dashboard') }}">
                {{ __('Account') }}
            </x-jet-dropdown-link>
            <x-jet-dropdown-link href="#">
                {{ __('Order history') }}
            </x-jet-dropdown-link>
            <x-jet-dropdown-link href="#">
                {{ __('Wishlist') }}
            </x-jet-dropdown-link>
            <div class="border-t border-gray-100"></div>
            <x-jet-dropdown-link href="{{ route('customer.account.logout') }}">
                {{ __('Logout') }}
            </x-jet-dropdown-link>
        @else
            @if (Route::has('customer.account.login'))
                <x-jet-dropdown-link href="{{ route('customer.account.login') }}">
                    {{ __('Login') }}
                </x-jet-dropdown-link>
            @endif
            @if (Route::has('customer.account.register'))
                <x-jet-dropdown-link href="{{ route('customer.account.register') }}">
                    {{ __('Logout') }}
                </x-jet-dropdown-link>
            @endif
        @endif
    </x-slot>
</x-jet-dropdown>