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
				'items-per-page-options':[10, 20, 30, 50, 100]
			}"
    >

		<template v-slot:top>
			<v-toolbar flat >
				<v-toolbar-title>Products</v-toolbar-title>
				<v-divider class="mx-4" inset vertical></v-divider>
				<v-spacer></v-spacer>
				<v-btn color="primary" depressed dark class="mb-2">
					Add New Item
				</v-btn>
			</v-toolbar>
		</template>

		<template v-slot:item.status="{ item }">
      <v-chip dark v-if="item.status == 1"> Enable </v-chip>
			<v-chip dark v-else> Disable </v-chip>
    </template>

		<template v-slot:item.images="{ item }">
			<template v-for="image in item.images">
				<v-img v-if="image.type == 0" max-height="70" max-width="60" :src="setImage(image.image)" class="my-2"></v-img>
			</template>
    </template>

		<template v-slot:item.prices="{ item }">
			<template v-for="price in item.prices">
				<span style="display:block"> Qty : {{price.quantity}} - Price :{{price.base_price}} </span>
			</template>
    </template>

		<template v-slot:item.inventories="{ item }">
			<template v-for="inventory in item.inventories">
				<span style="display:block"> Qty : {{inventory.quantity}} - Source :{{inventory.source_id}} </span>
			</template>
    </template>

		<template v-slot:item.actions="{ item }">
		  <v-icon small class="mr-2">
		    mdi-pencil
		  </v-icon>
		  <v-icon small>
		    mdi-delete
		  </v-icon>
		</template>
		</v-data-table>

	</app-layout>
</template>



<script>
    import AppLayout from './../../../Layouts/AppLayout'
    export default {
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
					  itemsPerPage: 10,
					  multiSort: false,
					  mustSort: false
					},
	        headers: [
						{ text: 'image', sortable: false, value: 'images' },
	          { text: 'SKU', sortable: false,  value: 'sku' },
	          { text: 'Title', value: 'title' },
	          { text: 'Status', value: 'status' },
	          { text: 'Price (Default)', sortable: false, value: 'prices' },
	          { text: 'Inventory (Total)', sortable: false, value: 'inventories' },
						{ text: 'Actions', value: 'actions', sortable: false },
	        ],
	      }
    	},
			watch: {
	      options: {
	        handler: function (newVal, oldVal) {
						let query = '?page=' + newVal.page + '&itemsPerPage=' + newVal.itemsPerPage
	          this.getCategories(query)
	        },
	        deep: true,
	      },
	    },
	    mounted () {
				this.options.page = 1
				this.options.itemsPerPage = 10
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
				}
	    },
    }
</script>
