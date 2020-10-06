<template>
	<div>
		<v-btn color="primary" type="button" class="my-4" @click.native="updateTreeOrder()" :disabled="disabled">
			Update Tree
		</v-btn>
		<inertia-link href="/admin/catalog/category/create" v-if="type == 'edit'" class="link-button">
			Create New
		</inertia-link>
		<p>{{listUpdatedMsg}}</p>
		<dragable-tree v-if="list.length > 0" :tasks="list"/>
		<span v-else>{{status}}</span>
	</div>
</template>

<script type="text/javascript">
	import DragableTree from "./../../../Components/ChildTree"
	  export default {
			components: {
					DragableTree
			},
			props: {
				type: String,
			},
			data() {
				return {
					list: [],
					disabled : false,
					listUpdatedMsg : '',
					status : ''
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
					this.status = 'loading...'
					return await axios.get('/admin/catalog/category/tree')
						.then((response) => {
							if (response.data != []) {
								this.status = 'Empty Category'
							}else {
								this.list = response.data
							}
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
