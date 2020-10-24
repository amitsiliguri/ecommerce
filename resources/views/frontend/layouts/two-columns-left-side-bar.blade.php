<x-Frontend.Layouts.one-column-full-width>
    <div class="flex flex-col md:flex-row max-w-screen-xl mx-auto" x-data="page()">
        <div class="w-full md:w-3/12 px-2 xl:px-0"> 
            {{ $sidebarMain ?? '' }}
            
            {{ $sidebarAdditional ?? '' }}
        </div>
        <div class="w-full md:w-9/12 px-2 xl:px-0">{{ $slot }}</div>
    </div>

    <x-slot name="jsscript">
        {{$script ?? ''}}
    </x-slot>
</x-Frontend.Layouts.one-column-full-width>