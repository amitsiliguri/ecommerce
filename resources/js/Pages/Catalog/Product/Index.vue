<template>
	<app-layout>
		<template #header>Products</template>


		<v-data-table
			v-model="selected"
			item-key="name"
    	show-select
      :headers="headers"
      :items="desserts"
      :options.sync="options"
      :server-items-length="totalDesserts"
      :loading="loading"
      class="elevation-1"
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
					totalDesserts: 0,
	        desserts: [],
	        loading: true,
	        options: {
					  page: 1,
					  itemsPerPage: 10,
					  multiSort: false,
					  mustSort: false
					},
	        headers: [
	          { text: 'Dessert (100g serving)', sortable: false,  value: 'name' },
	          { text: 'Calories', value: 'calories' },
	          { text: 'Fat (g)', value: 'fat' },
	          { text: 'Carbs (g)', value: 'carbs' },
	          { text: 'Protein (g)', value: 'protein' },
	          { text: 'Iron (%)', value: 'iron' },
						{ text: 'Actions', value: 'actions', sortable: false },
	        ],
	      }
    	},
			watch: {
	      options: {
	        handler () {
	          this.getDataFromApi()
	            .then(data => {
	              this.desserts = data.items
	              this.totalDesserts = data.total
	            })
	        },
	        deep: true,
	      },
	    },
	    mounted () {
				this.options.page = 1
				this.options.itemsPerPage = 10
	    },
	    methods: {
	      getDataFromApi () {
	        this.loading = true
	        return new Promise((resolve, reject) => {
	          const { sortBy, sortDesc, page, itemsPerPage } = this.options

	          let items = this.getDesserts()
	          const total = items.length

	          if (sortBy.length === 1 && sortDesc.length === 1) {
	            items = items.sort((a, b) => {
	              const sortA = a[sortBy[0]]
	              const sortB = b[sortBy[0]]

	              if (sortDesc[0]) {
	                if (sortA < sortB) return 1
	                if (sortA > sortB) return -1
	                return 0
	              } else {
	                if (sortA < sortB) return -1
	                if (sortA > sortB) return 1
	                return 0
	              }
	            })
	          }

	          if (itemsPerPage > 0) {
	            items = items.slice((page - 1) * itemsPerPage, page * itemsPerPage)
	          }

	          setTimeout(() => {
	            this.loading = false
	            resolve({
	              items,
	              total,
	            })
	          }, 1000)
	        })
	      },
	      getDesserts () {
	        return [
	          {
	            name: 'Frozen Yogurt',
	            calories: 159,
	            fat: 6.0,
	            carbs: 24,
	            protein: 4.0,
	            iron: '1%',
	          },
	          {
	            name: 'Ice cream sandwich',
	            calories: 237,
	            fat: 9.0,
	            carbs: 37,
	            protein: 4.3,
	            iron: '1%',
	          },
	          {
	            name: 'Eclair',
	            calories: 262,
	            fat: 16.0,
	            carbs: 23,
	            protein: 6.0,
	            iron: '7%',
	          },
	          {
	            name: 'Cupcake',
	            calories: 305,
	            fat: 3.7,
	            carbs: 67,
	            protein: 4.3,
	            iron: '8%',
	          },
	          {
	            name: 'Gingerbread',
	            calories: 356,
	            fat: 16.0,
	            carbs: 49,
	            protein: 3.9,
	            iron: '16%',
	          },
	          {
	            name: 'Jelly bean',
	            calories: 375,
	            fat: 0.0,
	            carbs: 94,
	            protein: 0.0,
	            iron: '0%',
	          },
	          {
	            name: 'Lollipop',
	            calories: 392,
	            fat: 0.2,
	            carbs: 98,
	            protein: 0,
	            iron: '2%',
	          },
	          {
	            name: 'Honeycomb',
	            calories: 408,
	            fat: 3.2,
	            carbs: 87,
	            protein: 6.5,
	            iron: '45%',
	          },
	          {
	            name: 'Donut',
	            calories: 452,
	            fat: 25.0,
	            carbs: 51,
	            protein: 4.9,
	            iron: '22%',
	          },
	          {
	            name: 'KitKat',
	            calories: 518,
	            fat: 26.0,
	            carbs: 65,
	            protein: 7,
	            iron: '6%',
	          },
						{
	            name: 'Frozen Yogurt',
	            calories: 159,
	            fat: 6.0,
	            carbs: 24,
	            protein: 4.0,
	            iron: '1%',
	          },
	          {
	            name: 'Ice cream sandwich',
	            calories: 237,
	            fat: 9.0,
	            carbs: 37,
	            protein: 4.3,
	            iron: '1%',
	          },
	          {
	            name: 'Eclair',
	            calories: 262,
	            fat: 16.0,
	            carbs: 23,
	            protein: 6.0,
	            iron: '7%',
	          },
	          {
	            name: 'Cupcake',
	            calories: 305,
	            fat: 3.7,
	            carbs: 67,
	            protein: 4.3,
	            iron: '8%',
	          },
	          {
	            name: 'Gingerbread',
	            calories: 356,
	            fat: 16.0,
	            carbs: 49,
	            protein: 3.9,
	            iron: '16%',
	          },
	          {
	            name: 'Jelly bean',
	            calories: 375,
	            fat: 0.0,
	            carbs: 94,
	            protein: 0.0,
	            iron: '0%',
	          },
	          {
	            name: 'Lollipop',
	            calories: 392,
	            fat: 0.2,
	            carbs: 98,
	            protein: 0,
	            iron: '2%',
	          },
	          {
	            name: 'Honeycomb',
	            calories: 408,
	            fat: 3.2,
	            carbs: 87,
	            protein: 6.5,
	            iron: '45%',
	          },
	          {
	            name: 'Donut',
	            calories: 452,
	            fat: 25.0,
	            carbs: 51,
	            protein: 4.9,
	            iron: '22%',
	          },
	          {
	            name: 'KitKat',
	            calories: 518,
	            fat: 26.0,
	            carbs: 65,
	            protein: 7,
	            iron: '6%',
	          },
						{
	            name: 'Frozen Yogurt',
	            calories: 159,
	            fat: 6.0,
	            carbs: 24,
	            protein: 4.0,
	            iron: '1%',
	          },
	          {
	            name: 'Ice cream sandwich',
	            calories: 237,
	            fat: 9.0,
	            carbs: 37,
	            protein: 4.3,
	            iron: '1%',
	          },
	          {
	            name: 'Eclair',
	            calories: 262,
	            fat: 16.0,
	            carbs: 23,
	            protein: 6.0,
	            iron: '7%',
	          },
	          {
	            name: 'Cupcake',
	            calories: 305,
	            fat: 3.7,
	            carbs: 67,
	            protein: 4.3,
	            iron: '8%',
	          },
	          {
	            name: 'Gingerbread',
	            calories: 356,
	            fat: 16.0,
	            carbs: 49,
	            protein: 3.9,
	            iron: '16%',
	          },
	          {
	            name: 'Jelly bean',
	            calories: 375,
	            fat: 0.0,
	            carbs: 94,
	            protein: 0.0,
	            iron: '0%',
	          },
	          {
	            name: 'Lollipop',
	            calories: 392,
	            fat: 0.2,
	            carbs: 98,
	            protein: 0,
	            iron: '2%',
	          },
	          {
	            name: 'Honeycomb',
	            calories: 408,
	            fat: 3.2,
	            carbs: 87,
	            protein: 6.5,
	            iron: '45%',
	          },
	          {
	            name: 'Donut',
	            calories: 452,
	            fat: 25.0,
	            carbs: 51,
	            protein: 4.9,
	            iron: '22%',
	          },
	          {
	            name: 'KitKat',
	            calories: 518,
	            fat: 26.0,
	            carbs: 65,
	            protein: 7,
	            iron: '6%',
	          },
						{
	            name: 'Frozen Yogurt',
	            calories: 159,
	            fat: 6.0,
	            carbs: 24,
	            protein: 4.0,
	            iron: '1%',
	          },
	          {
	            name: 'Ice cream sandwich',
	            calories: 237,
	            fat: 9.0,
	            carbs: 37,
	            protein: 4.3,
	            iron: '1%',
	          },
	          {
	            name: 'Eclair',
	            calories: 262,
	            fat: 16.0,
	            carbs: 23,
	            protein: 6.0,
	            iron: '7%',
	          },
	          {
	            name: 'Cupcake',
	            calories: 305,
	            fat: 3.7,
	            carbs: 67,
	            protein: 4.3,
	            iron: '8%',
	          },
	          {
	            name: 'Gingerbread',
	            calories: 356,
	            fat: 16.0,
	            carbs: 49,
	            protein: 3.9,
	            iron: '16%',
	          },
	          {
	            name: 'Jelly bean',
	            calories: 375,
	            fat: 0.0,
	            carbs: 94,
	            protein: 0.0,
	            iron: '0%',
	          },
	          {
	            name: 'Lollipop',
	            calories: 392,
	            fat: 0.2,
	            carbs: 98,
	            protein: 0,
	            iron: '2%',
	          },
	          {
	            name: 'Honeycomb',
	            calories: 408,
	            fat: 3.2,
	            carbs: 87,
	            protein: 6.5,
	            iron: '45%',
	          },
	          {
	            name: 'Donut',
	            calories: 452,
	            fat: 25.0,
	            carbs: 51,
	            protein: 4.9,
	            iron: '22%',
	          },
	          {
	            name: 'KitKat',
	            calories: 518,
	            fat: 26.0,
	            carbs: 65,
	            protein: 7,
	            iron: '6%',
	          },
						{
	            name: 'Frozen Yogurt',
	            calories: 159,
	            fat: 6.0,
	            carbs: 24,
	            protein: 4.0,
	            iron: '1%',
	          },
	          {
	            name: 'Ice cream sandwich',
	            calories: 237,
	            fat: 9.0,
	            carbs: 37,
	            protein: 4.3,
	            iron: '1%',
	          },
	          {
	            name: 'Eclair',
	            calories: 262,
	            fat: 16.0,
	            carbs: 23,
	            protein: 6.0,
	            iron: '7%',
	          },
	          {
	            name: 'Cupcake',
	            calories: 305,
	            fat: 3.7,
	            carbs: 67,
	            protein: 4.3,
	            iron: '8%',
	          },
	          {
	            name: 'Gingerbread',
	            calories: 356,
	            fat: 16.0,
	            carbs: 49,
	            protein: 3.9,
	            iron: '16%',
	          },
	          {
	            name: 'Jelly bean',
	            calories: 375,
	            fat: 0.0,
	            carbs: 94,
	            protein: 0.0,
	            iron: '0%',
	          },
	          {
	            name: 'Lollipop',
	            calories: 392,
	            fat: 0.2,
	            carbs: 98,
	            protein: 0,
	            iron: '2%',
	          },
	          {
	            name: 'Honeycomb',
	            calories: 408,
	            fat: 3.2,
	            carbs: 87,
	            protein: 6.5,
	            iron: '45%',
	          },
	          {
	            name: 'Donut',
	            calories: 452,
	            fat: 25.0,
	            carbs: 51,
	            protein: 4.9,
	            iron: '22%',
	          },
	          {
	            name: 'KitKat',
	            calories: 518,
	            fat: 26.0,
	            carbs: 65,
	            protein: 7,
	            iron: '6%',
	          },
						{
	            name: 'Frozen Yogurt',
	            calories: 159,
	            fat: 6.0,
	            carbs: 24,
	            protein: 4.0,
	            iron: '1%',
	          },
	          {
	            name: 'Ice cream sandwich',
	            calories: 237,
	            fat: 9.0,
	            carbs: 37,
	            protein: 4.3,
	            iron: '1%',
	          },
	          {
	            name: 'Eclair',
	            calories: 262,
	            fat: 16.0,
	            carbs: 23,
	            protein: 6.0,
	            iron: '7%',
	          },
	          {
	            name: 'Cupcake',
	            calories: 305,
	            fat: 3.7,
	            carbs: 67,
	            protein: 4.3,
	            iron: '8%',
	          },
	          {
	            name: 'Gingerbread',
	            calories: 356,
	            fat: 16.0,
	            carbs: 49,
	            protein: 3.9,
	            iron: '16%',
	          },
	          {
	            name: 'Jelly bean',
	            calories: 375,
	            fat: 0.0,
	            carbs: 94,
	            protein: 0.0,
	            iron: '0%',
	          },
	          {
	            name: 'Lollipop',
	            calories: 392,
	            fat: 0.2,
	            carbs: 98,
	            protein: 0,
	            iron: '2%',
	          },
	          {
	            name: 'Honeycomb',
	            calories: 408,
	            fat: 3.2,
	            carbs: 87,
	            protein: 6.5,
	            iron: '45%',
	          },
	          {
	            name: 'Donut',
	            calories: 452,
	            fat: 25.0,
	            carbs: 51,
	            protein: 4.9,
	            iron: '22%',
	          },
	          {
	            name: 'KitKat',
	            calories: 518,
	            fat: 26.0,
	            carbs: 65,
	            protein: 7,
	            iron: '6%',
	          },
	        ]
	      },
	    },
    }
</script>
