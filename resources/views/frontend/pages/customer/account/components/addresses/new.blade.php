<x-Frontend.Layouts.Components.Modal id="newAddress">
    <x-slot name="trigger">Add New Address</x-slot>



    <div class="rounded border border-gray-100 w-full">
        <div class="py-2 px-2 md:px-3 bg-gray-100">
            <h3 class="text-xl">New Address</h3>
        </div>
        <div class="py-2 px-2 md:px-3">
            <input type="email" name="email" id="email" placeholder="email">
        </div>
    </div>
</x-Frontend.Layouts.Components.Modal>