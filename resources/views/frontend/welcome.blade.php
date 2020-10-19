<x-Frontend.Layouts.Guest>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('customer.account.login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth('customer')
                    <a href="{{ route('customer.account.dashboard') }}" class="text-sm text-gray-700 underline">Account</a>
                    <a href="{{ route('customer.account.logout') }}" class="text-sm text-gray-700 underline">Logout</a>
                @else
                    <a href="{{ route('customer.account.login') }}" class="text-sm text-gray-700 underline">Login</a>
                    <a href="#" class="text-sm text-gray-700 underline">Register</a>
                @endif
            </div>
        @endif
    </div>
</x-Frontend.Layouts.Guest>
