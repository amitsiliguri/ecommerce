<div class="flex flex-row flex-wrap max-w-screen-xl mx-auto items-center" x-data="{ isSearchClose: true }">
    
    <div class="px-2 md:hidden flex-grow-0 xl:px-0">
        <span class="mdi mdi-menu text-teal-500 text-3xl"></span>
    </div>

    <div class="flex-grow px-2 xl:px-0">logo</div>

    <div class="px-3 md:hidden flex-grow-0">
        <span class="mdi mdi-magnify text-teal-500 text-3xl cursor-pointer" @click="isSearchClose = !isSearchClose"></span>
    </div>

    <div class="md:order-4 px-3 flex-grow-0">
        <x-Frontend.Layouts.Components.mini-cart/>
    </div>

    <div class="md:order-5 px-3 flex-grow-0">
        <x-Frontend.Layouts.Components.account-dropdown/>
    </div>

    <div class="w-full md:w-4/12 lg:w-3/12 md:order-3 px-2 py-2 md:flex" x-bind:class="{'hidden' : isSearchClose}">
        <form class="w-full">
            <div class="flex items-center border border-teal-400 rounded">
                <input class="appearance-none bg-transparent border-none w-full text-gray-700 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Search" aria-label="Search">
                <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm px-1 rounded focus:outline-none" type="button">
                    <span class="mdi mdi-magnify text-xl"></span>
                </button>
            </div>
        </form>
    </div>
</div>