<div class="flex flex-col bg-gray-600 text-gray-100 py-2 px-2">
    <div class="w-full max-w-screen-xl mx-auto">
        @if (Route::has('customer.account.login'))
            @auth('customer')
                <a href="{{ route('customer.account.dashboard') }}">Account</a>
                <a href="{{ route('customer.account.logout') }}">Logout</a>
            @else
                <a href="{{ route('customer.account.login') }}">Login</a>
                @if (Route::has('customer.account.login'))
                    <a href="#">Register</a>
                @endif
            @endif
        @endif
    </div>     
</div>

