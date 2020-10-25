<template x-if="hasPagination">
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between my-4 py-4 border-t border-b">
        {{-- mobile pagination --}}
        <div class="flex justify-between flex-1 sm:hidden">
            <button @click="previousPagelink()" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </button>
            
            <button @click="nextPagelink()" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </button>
        </div>
    
        {{-- desktop pagination --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Showing from') !!}
                    <span class="font-medium" x-text="products.from"></span>
                    {!! __('to') !!}
                    <span class="font-medium"  x-text="products.to"></span>
                    {!! __('of') !!}
                    <span class="font-medium" x-text="products.total"></span>
                    {!! __('results') !!}
                </p>
            </div>
    
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    <button @click="previousPagelink()" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </button>
                    <button @click="nextPagelink()" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </button>
                </span>
            </div>
        </div>
    </nav>
</template>
