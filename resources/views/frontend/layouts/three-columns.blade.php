<x-Frontend.Layouts.one-column-full-width>
    <div class="flex flex-col md:flex-row max-w-screen-xl mx-auto">
        <div class="w-full md:w-2/12">{{ $sidebarMain ?? '' }}</div>
        <div class="w-full md:w-8/12">{{ $slot }}</div>
        <div class="w-full md:w-2/12">{{ $sidebarAdditional ?? '' }}</div>
    </div>
</x-Frontend.Layouts.one-column-full-width>