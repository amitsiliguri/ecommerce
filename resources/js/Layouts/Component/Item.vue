<template>
	<div>

		<div @click="open = ! open" class="cursor-pointer text-gray-100 text-center mt-3">
			<span class="mdi text-3xl" :class="item.icon"></span>
			<p class="text-xs -m-2">{{item.name}}</p>
		</div>

		<div v-show="open" class="fixed inset-0 z-40 bg-gray-900 bg-opacity-25" @click="open = false"></div>





		<transition
				enter-active-class="transition ease-out duration-200"
				enter-class="transform opacity-0"
				enter-to-class="transform opacity-100"
				leave-active-class="transition ease-in duration-75"
				leave-class="transform opacity-100"
				leave-to-class="transform opacity-0">
				<div v-if="item.children.length > 0" class="fixed top-0 z-50 shadow-2xl h-screen bg-white w-64 flex flex-col" v-show="open">
					<template v-for="(child,index) in item.children">
						<!-- section -->
						<small v-if="child.type == 'head'" :key="index" class="uppercase text-gray-400 mt-4 px-3 text-sm">{{child.name}}</small>
						<!-- link -->
						<inertia-link v-else-if="child.type == 'link'" :href="child.link" :key="index" class="border-l-4 text-sm py-2 transition duration-150 ease-in-out focus:outline-none px-2" :class="{'border-indigo-400 text-gray-900 focus:border-indigo-700 bg-gray-100 focus:bg-gray-200' : $page.currentRouteName == child.routename, 'border-transparent text-gray-600 hover:border-indigo-200 hover:bg-gray-50' : $page.currentRouteName != child.routename}">
							{{child.name}}
						</inertia-link>
					</template>
				</div>
		</transition>

	</div>
</template>

<script>
    export default {
        props: ['item'],
				data() {
            return {
                open: false,
            }
        },
    }
</script>

<style media="screen" scoped>
	.-left-64 {
		left: -16rem;
	}
</style>
