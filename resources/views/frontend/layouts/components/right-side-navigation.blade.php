<div x-data="{ isOpen: false }">
    <span class="mdi {{$_triggericon ?? 'mdi-menu'}} text-teal-500 text-3xl md:text-2xl cursor-pointer" @click="isOpen = true"></span>
    <div x-bind:class="{ 'fixed z-40 inset-0 bg-black opacity-25': isOpen}" @click="isOpen = false"></div>
    <div x-bind:class="{ 'right-slide-open': isOpen , 'right-slide-close': !isOpen }" class="fixed z-50 top-0 bottom-0 bg-white right-slide px-2 py-2 flex flex-col">
        {{ $slot }}
    </div>
</div>