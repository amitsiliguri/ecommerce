<x-Frontend.Layouts.one-column-full-width>
    <div class="flex flex-col md:flex-row max-w-screen-xl mx-auto" style="min-height:430px">
        <div class="w-full md:w-3/12">{{ $sidebarMain }}</div>
        <div class="w-full md:w-6/12">{{ $slot }}</div>
        <div class="w-full md:w-3/12">{{ $sidebarAdditional }}</div>
    </div>
</x-Frontend.Layouts.one-column-full-width>