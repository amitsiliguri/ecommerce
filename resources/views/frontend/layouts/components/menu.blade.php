<div x-data="{ isMainMenuOpen: false }" class="md:bg-gray-100">
    <div x-bind:class="{ 'fixed z-40 inset-0 bg-black opacity-25': isMainMenuOpen}" @click="isMainMenuOpen = false" class="md:hidden"></div>
    <div x-bind:class="{ 'main-menu-open': isMainMenuOpen , 'main-menu-close': !isMainMenuOpen }" x-on:mainmenutoggle.window="isMainMenuOpen = !isMainMenuOpen" class="fixed z-50 top-0 bottom-0 w-64 md:w-full md:static md:flex md:flex-row max-w-screen-xl md:mx-auto main-menu-cover">
        <div class="w-full">
            <ul class="main-menu">
                @php
                    $data = $getMenu();
                @endphp
                @include('frontend.layouts.components.submenu', ['data' => $data, 'parents' => $data[0],'level' => 0, ])
            </ul>
        </div>  
    </div>
</div>