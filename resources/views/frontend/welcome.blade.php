<x-Frontend.Layouts.Guest>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('customer.login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth('customer')
                    <a href="#" class="text-sm text-gray-700 underline">Dashboard</a>
                    <a href="{{ route('customer.logout') }}" class="text-sm text-gray-700 underline">Logout</a>
                @else
                    <a href="{{ route('customer.login') }}" class="text-sm text-gray-700 underline">Login</a>
                    <a href="#" class="text-sm text-gray-700 underline">Register</a>
                @endif
            </div>
        @endif

        @auth('customer')
            customer login <br>
            {{ Auth::guard('customer')->user()->name }} <br> <br>
        @else
            customer log out <br>
        @endif

        @auth('web')
            admin login <br>
            {{ Auth::guard('web')->user()->name }}
        @else
            admin log out <br>
        @endif

    </div>
</x-Frontend.Layouts.Guest>
