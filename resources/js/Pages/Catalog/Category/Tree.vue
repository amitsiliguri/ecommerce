<template>
	<div>
		<jet-secondary-button class="mb-3" type="button" @click.native="updateTreeOrder()" :disabled="disabled" :class="{ 'opacity-25': disabled }">	Update Tree	</jet-secondary-button>
		<span>{{listUpdatedMsg}}</span>
		<dragable-tree v-if="list.length > 0" :tasks="list"/>
	</div>
</template>

<script type="text/javascript">
	import JetSecondaryButton from './../../../Jetstream/SecondaryButton'
	import DragableTree from "./../../../Component/Tree"
	  export default {
			components: {
					JetSecondaryButton,
					DragableTree
			},
			data() {
				return {
					list: [],
					disabled : false,
					listUpdatedMsg : ''
				};
			},
			watch : {
				listUpdatedMsg: function (val, oldVal) {
					if (val != '') {
						setTimeout(() => {
							this.clearMessage()
						}, 3000)
					}
				},
			},
			mounted () {
				this.getTree()
			},
			methods:{
				async getTree() {
					return await axios.get('/admin/catalog/category/tree')
						.then((response) => {
								this.list = response.data
						})
				},
				clearMessage(){
					this.listUpdatedMsg = ''
				},
				updateTreeOrder() {
					this.disabled = true
					axios.post('/admin/catalog/category/tree/reorder', this.list )
					.then((response) => {
						if (response.data.success) {
							this.listUpdatedMsg = "Categories Reorderd."
						}
					}).catch((error) => {
						this.listUpdatedMsg = "Unable to Reorder Categories."
					}).finally(() => {
						this.disabled = false
					})
				}
			}
		}
</script>
