<div class="border border-gray-100 rounded mb-2" x-data="{ ishideOnMobile : true}">

    <div class="block w-full focus:outline-none lg:hidden px-4 py-2 cursor-pointer" @click="ishideOnMobile = !ishideOnMobile">Account Links</div>

    <ul class="lg:block" x-bind:class="{'hidden' : ishideOnMobile}">
        <li class="bg-gray-100 px-4 py-2">
            <a href="{{  route('customer.account.dashboard') }}">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="px-4 py-2">
            <a href="{{  route('customer.account.order.history') }}">
                {{ __('Order History') }}
            </a>
        </li>
        <li class="bg-gray-100 px-4 py-2">
            <a href="{{  route('customer.account.wishlist') }}">
                {{ __('Wishlist') }}
            </a>
        </li>
        <li class="px-4 py-2">
            <a href="{{  route('customer.account.profile') }}">
                {{ __('Profile') }}
            </a>
        </li>
        <li class="bg-gray-100 px-4 py-2">
            <a href="{{  route('customer.account.address.index') }}">
                {{ __('My Addresses') }}
            </a>
        </li>
        <li class="px-4 py-2">
            <a href="{{  route('customer.account.address.index') }}">
                {{ __('My reviews') }}
            </a>
        </li>
        <li class="bg-gray-100 px-4 py-2">
            <a href="{{  route('customer.account.address.index') }}">
                {{ __('Return Request') }}
            </a>
        </li>
        <li class="px-4 py-2">
            <a href="{{  route('customer.account.address.index') }}">
                {{ __('Wallet') }}
            </a>
        </li>
    </ul>

</div>

