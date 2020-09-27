<template>
  <draggable class="dragArea" tag="ul" :list="tasks" :group="{ name: 'g1' }">
    <li v-for="el in tasks" :key="el.name">
			<div class="shadow overflow-hidden rounded-md p-4">
				{{ el.name }}
			</div>
      <nested-draggable :tasks="el.tasks" />
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
			margin-left: 25px
		}
	}
}
</style>
