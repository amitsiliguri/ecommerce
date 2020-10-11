<template>
	<app-layout>
		<template #header>Create New Products</template>

		<v-form ref="productCreateForm" lazy-validation>
			<v-container>

        <v-row>
					<v-col cols="12">
						<h3>General</h3>
					</v-col>
					<v-col cols="12" sm="6" md="2">
						<v-switch label="Enable"></v-switch>
					</v-col>
					<v-col cols="12" sm="6" md="5">
						<v-text-field label="SKU" placeholder="Stock Keeping unit" dense outlined></v-text-field>
					</v-col>
					<v-col cols="12" sm="6" md="5">
						<v-text-field label="Title" placeholder="Product title" dense outlined></v-text-field>
					</v-col>
					<v-col cols="12">
						<v-textarea outlined :counter="300" label="Small Description" dense rows="4" clearable clear-icon="mdi-close-circle"></v-textarea>
					</v-col>
					<v-col cols="12">
						<v-textarea outlined :counter="300" label="Description" dense rows="8" clearable clear-icon="mdi-close-circle"></v-textarea>
					</v-col>
        </v-row>


				<v-row>
					<v-col cols="12">
						<h3>SEO</h3>
					</v-col>
					<v-col cols="12" sm="6">
						<v-text-field :counter="60" label="Slug" placeholder="Puoduct unique slug" outlined dense required></v-text-field>
					</v-col>
					<v-col cols="12" sm="6">
						<v-text-field label="Meta Title" placeholder="SEO Title" dense outlined></v-text-field>
					</v-col>
        </v-row>


				<v-row>
					<v-col cols="12">
						<v-file-input label="Meta Image" accept="image/png, image/jpeg, image/jpg" outlined dense></v-file-input>
					</v-col>
					<v-col cols="12">
						<v-textarea outlined :counter="170" label="Meta Description" dense rows="3" clearable clear-icon="mdi-close-circle"></v-textarea>
					</v-col>
        </v-row>


				<v-row>
					<v-col cols="12" class="d-inline-flex align-center">
						<h3>Price</h3>
						<v-spacer></v-spacer>
						<v-btn depressed> Add more prices </v-btn>
					</v-col>
					<v-col cols="12" md="2">
						<v-text-field label="Qty" placeholder="Puoduct Quantity" outlined dense required></v-text-field>
					</v-col>
					<v-col cols="12" sm="3">
						<v-text-field label="Base Price" placeholder="Puoduct MRP" outlined dense required></v-text-field>
					</v-col>
					<v-col cols="12" sm="3">
						<v-text-field label="Offer Price" placeholder="Special Price" outlined dense required></v-text-field>
					</v-col>
					<v-col cols="12" sm="3">
						<v-text-field label="Offer period" placeholder="Date range"  outlined dense required></v-text-field>
					</v-col>
					<v-col cols="12" sm="1">
						<v-btn icon color="primary">
							<v-icon dark> mdi-close </v-icon>
						</v-btn>
					</v-col>
				</v-row>






				<v-row>
					<v-col cols="2">
						<h3>Inventory</h3>
					</v-col>
					<v-col cols="7"></v-col>
					<v-col cols="3">
						<v-select v-model="value" :items="items" :menu-props="{ maxHeight: '250' }" label="Sources" multiple dense outlined>
							<template v-slot:selection="{ item, index }">
				        <span v-if="index === 0" class="grey--text caption">
				          {{value.length}} Source selected
				        </span>
				      </template>
						</v-select>
					</v-col>
					<v-col cols="12" md="6">
						<v-text-field label="Source" placeholder="Inventory source" readonly outlined dense required></v-text-field>
					</v-col>
					<v-col cols="12" sm="6">
						<v-text-field label="Stock" placeholder="Puoduct Stock" outlined dense required></v-text-field>
					</v-col>
				</v-row>



				<v-row>
					<v-col cols="2">
						<h3>Images</h3>
					</v-col>
					<v-col cols="10"></v-col>
					<v-col cols="12" md="4">
						<v-file-input label="Small Image" accept="image/png, image/jpeg, image/jpg" outlined dense></v-file-input>
					</v-col>
					<v-col cols="12" md="4">
						<v-file-input label="Thumbnail Image" accept="image/png, image/jpeg, image/jpg" outlined dense></v-file-input>
					</v-col>
					<v-col cols="12" md="4">
						<v-file-input label="Base Image" accept="image/png, image/jpeg, image/jpg" outlined dense></v-file-input>
					</v-col>
				</v-row>

				<v-row>
					<v-col cols="12">
						<v-btn color="primary" class="mr-4"> Submit </v-btn>
					</v-col>
				</v-row>
			</v-container>


	  </v-form>

	</app-layout>
</template>



<script>
    import AppLayout from './../../../Layouts/AppLayout'
		import Currency from './../../../Mixins/Currency'
    export default {
			mixins: [Currency],
      components: {
        AppLayout
      },
			data: () => ({
	      items: ['Foo', 'Bar', 'Fizz', 'Buzz','fgfg', 'dbbd', 'bqbq', 'jafwye','hgpryxm'],
				value: [],
	    }),
    }
</script>


<style media="screen" scoped>
	.v-input--selection-controls {
		margin-top: 4px;
	}
</style>
