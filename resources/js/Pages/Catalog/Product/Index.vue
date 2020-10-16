<template>
	<app-layout>
		<template #header>Products</template>

		<v-data-table
			v-model="selected"
			item-key="sku"
    	show-select
      :headers="headers"
      :items="categories"
      :options.sync="options"
      :server-items-length="totalCategories"
      :loading="loading"
      class="elevation-1"
			height="440"
			loader-height="2"
			:footer-props="{
				'items-per-page-options':itemsPerPageOptions
			}"
			:items-per-page="options.itemsPerPage"
    >

			<template v-slot:top>
				<v-toolbar flat >
					<v-toolbar-title>Products</v-toolbar-title>
					<v-divider class="mx-4" inset vertical></v-divider>
					<v-btn icon @click="massDelete()">
						<v-icon small> mdi-delete </v-icon>
					</v-btn>
					<v-spacer></v-spacer>
					<v-btn color="primary" depressed dark class="mb-2" @click="createNewProduct()">
						Add New Item
					</v-btn>
				</v-toolbar>
			</template>

			<template v-slot:item.status="{ item }">
	      <v-chip small color="primary" v-if="item.status == 1"> Enable </v-chip>
				<v-chip small color="pink" v-else> Disable </v-chip>
	    </template>

			<template v-slot:item.images="{ item }">
				<template v-for="image in item.images">
					<v-img max-height="70" max-width="60" :src="image.image" class="my-2"></v-img>
				</template>
	    </template>

			<template v-slot:item.prices="{ item }">
				<template v-for="price in item.prices">
					<span style="display:block" v-if="price.quantity == 1"> {{price.base_price | currencyFormat}} </span>
				</template>
	    </template>

			<template v-slot:item.inventories="{ item }">
				{{totalInventory(item.inventories)}}
	    </template>

			<template v-slot:item.actions="{ item }">
			  <v-icon small class="mr-2">
			    mdi-pencil
			  </v-icon>
			</template>
		</v-data-table>

	</app-layout>
</template>



<script>
    import AppLayout from './../../../Layouts/AppLayout'
		import Currency from './../../../Mixins/Currency'
		import ClosestInArray from './../../../Mixins/ClosestInArray'
    export default {
			mixins: [Currency, ClosestInArray],
      components: {
        AppLayout
      },
			data () {
	      return {
					selected: [],
					totalCategories: 0,
	        categories: [],
	        loading: true,
	        options: {
					  page: 1,
					  itemsPerPage: 5,
					  multiSort: false,
					  mustSort: false
					},
					itemsPerPageOptions:[5, 10, 20, 30, 50, 100],
	        headers: [
						{ text: 'Image', sortable: false, value: 'images' },
	          { text: 'SKU', value: 'sku' },
	          { text: 'Title', sortable: false, value: 'title' },
	          { text: 'Status', value: 'status' },
	          { text: 'Base Price (Default)', sortable: false, value: 'prices' },
	          { text: 'Inventory (Total)', sortable: false, value: 'inventories' },
						{ text: 'Actions', value: 'actions', sortable: false },
	        ],
	      }
    	},
			watch: {
	      options: {
	        handler: function (newVal, oldVal) {
						let url = new URL(window.location.href)
				    url.searchParams.set('page', newVal.page)
						url.searchParams.set('itemsPerPage', newVal.itemsPerPage)
				    history.pushState(null, document.title, url.toString())
						let query = '?page=' + newVal.page + '&itemsPerPage=' + newVal.itemsPerPage
	          this.getCategories(query)
	        },
	        deep: true,
	      },
	    },
	    mounted () {
				let url = new URL(window.location.href)
				if (url.searchParams.get('page')) {
					this.options.page = url.searchParams.get('page')
				}
				if (url.searchParams.get('itemsPerPage')) {
					this.options.itemsPerPage = this.findClosest( this.itemsPerPageOptions , url.searchParams.get('itemsPerPage') )  // ClosestInArray mixin
				}
	    },
	    methods: {
				async getCategories(query){
					this.loading = true
					let url = '/admin/catalog/product/paginated/data' + query
					await axios.get(url)
					.then(response => {
						this.categories = response.data.data
						this.totalCategories = response.data.total
					})
			    .catch(error => {
			      console.log(error)
			    });
					this.loading = false
				},
				setImage(image){
					return '/image/product/small/' + image
				},
				totalInventory(inventories){
					let total = 0
					inventories.forEach(inventory => {
						total += inventory.quantity
					});
					return total
				},
				createNewProduct(){
					this.$inertia.replace('/admin/catalog/product/create');
				},
				massDelete(){
					let items = this.selected.length
					let ids = []
					if (items > 0) {

						this.selected.forEach(function(item) {
							ids.push(item.id)
						})
						if (confirm('Are you sure you want to delete items?')) {
							let deleteUrl = '/admin/catalog/product/delete/' + ids.toString()
							this.$inertia.delete(deleteUrl)
						}
					} else {
						alert("No item selcted!");
					}

				}
	    },
    }
</script>
