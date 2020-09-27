<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category
            </h2>
        </template>
        <div>
					<div class="grid grid-cols-3 gap-4">
						<div class="col-span-1 p-3">1</div>
						<div class="col-span-2 p-3">2</div>
					</div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../../Layouts/AppLayout'
    export default {
        components: {
            AppLayout,
        },
    }
</script>
