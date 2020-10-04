<template>
  <draggable class="dragArea" tag="ul" :list="tasks" :group="{ name: 'g1' }">
    <li v-for="el in tasks" :key="el.id">
			<div>
				<span class="mdi mdi-menu mr-4"></span>
				<span>{{ el.title }}</span>
				<span class="flex-grow"></span>
				<inertia-link :href="setEditUrl(el.id)">
          <span class="mdi mdi-pencil"></span>
        </inertia-link>
				<span class="mdi mdi-delete ml-4" @click="deleteItem(el)"></span>
			</div>
      <nested-draggable :tasks="el.children"/>
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
	  name: "nested-draggable",
		methods : {
			setEditUrl(id){
				return '/admin/catalog/category/edit/' + id
			},
			deleteItem(item) {
				console.log("delete event add here");
			}
		}
	};
</script>


<style scoped lang="scss">
	.dragArea {
		list-style-type: none;
		padding-left: 0;
		li{
			div{
				display: flex;
				margin: 3px 0px;
				padding: 7px 4px;
				box-shadow: 0 3px 1px -2px rgba(0,0,0,.2), 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12);
				border-radius: 4px;
				.flex-grow{
					flex-grow: 1
				}
			}
			ul{
				margin-left: 25px;
			}
		}
	}
</style>
