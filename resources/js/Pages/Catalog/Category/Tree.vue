<template>
  <draggable class="dragArea" tag="ul" :list="tasks" :group="{ name: 'g1' }">
    <li v-for="el in tasks" :key="el.id">
			<div class="shadow overflow-hidden rounded-md p-4 flex">
				<span class="mdi mdi-menu mr-4"></span>
				<span>{{ el.title }}</span>
				<span class="flex-grow"></span>
				<span class="mdi mdi-pencil"></span>
				<span class="mdi mdi-delete ml-4"></span>
			</div>
      <nested-draggable :tasks="el.children" />
    </li>
  </draggable>
</template>

<script>
	import draggable from 'vuedraggable';
	export default {
	  props: {
	    tasks: {
	      required: true,
	      type: Array
	    }
	  },
	  components: {
	    draggable
	  },
	  name: "nested-draggable"
	};
</script>


<style scoped lang="scss">
	.dragArea {
		li{
			ul{
				margin-left: 25px;
			}
		}
	}
</style>
