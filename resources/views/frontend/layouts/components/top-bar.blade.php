<div class="flex flex-col bg-gray-600 text-gray-100 py-2 px-2 xl:px-0">
    <div class="w-full max-w-screen-xl mx-auto">
        @if (Route::has('customer.account.login'))
            @auth('customer')
                <a href="{{ route('customer.account.dashboard') }}" class="text-xs">Account</a>
                <a href="{{ route('customer.account.logout') }}" class="text-xs">Logout</a>
            @else
                <a href="{{ route('customer.account.login') }}" class="text-xs">Login</a>
                @if (Route::has('customer.account.login'))
                    <a href="#" class="text-xs">Register</a>
                @endif
            @endif
        @endif
    </div>
</div>
