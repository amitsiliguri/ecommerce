<template>
	<app-layout>
		<template #header>Create New Products</template>

		<v-form ref="productCreateForm" lazy-validation v-model="valid" @submit.prevent="createProduct">
			<v-container>
				<v-row>
					<v-col cols="12">
						<v-tabs v-model="tab">
					    <v-tab>General</v-tab>
					    <v-tab>SEO</v-tab>
					    <v-tab>Price</v-tab>
							<v-tab>Inventory</v-tab>
							<v-tab>Image</v-tab>
						 	<v-tab>Category</v-tab>
							<v-tab>Attributes</v-tab>
					  </v-tabs>
					</v-col>
				</v-row>

				<v-tabs-items v-model="tab">
		      <v-tab-item>
						<v-row>
							<v-col cols="12">
								<h3>General</h3>
							</v-col>
							<v-col cols="12" sm="6" md="2">
								<v-switch label="Enable" v-model="productForm.status"></v-switch>
							</v-col>
							<v-col cols="12" sm="6" md="5">
								<v-text-field label="SKU" placeholder="Stock Keeping unit" v-model="productForm.sku" dense outlined></v-text-field>
							</v-col>
							<v-col cols="12" sm="6" md="5">
								<v-text-field label="Title" placeholder="Product title" v-model="productForm.title" dense outlined></v-text-field>
							</v-col>
							<v-col cols="12">
								<v-textarea outlined :counter="300" label="Small Description" v-model="productForm.small_description" dense rows="4" clearable clear-icon="mdi-close-circle"></v-textarea>
							</v-col>
							<v-col cols="12">
								<v-textarea outlined :counter="300" label="Description" v-model="productForm.description" dense rows="8" clearable clear-icon="mdi-close-circle"></v-textarea>
							</v-col>
		        </v-row>
		      </v-tab-item>

					<v-tab-item>
						<v-row>
							<v-col cols="12">
								<h3>SEO</h3>
							</v-col>
							<v-col cols="12" sm="6">
								<v-text-field :counter="60" label="Slug" v-model="productForm.slug" placeholder="Puoduct unique slug" outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="6">
								<v-text-field label="Meta Title" placeholder="SEO Title" v-model="productForm.meta_title" dense outlined></v-text-field>
							</v-col>
		        </v-row>
						<v-row>
							<image-upload labelprops="Meta Image" @imageevent="(newimage) => {productForm.meta_image = newimage}"/>
							<v-col cols="12">
								<v-textarea outlined :counter="170" label="Meta Description" v-model="productForm.meta_description" dense rows="3" clearable clear-icon="mdi-close-circle"></v-textarea>
							</v-col>
		        </v-row>
					</v-tab-item>


					<v-tab-item>
						<v-row>
							<v-col cols="12" class="d-inline-flex align-center">
								<h3>Price</h3>
								<v-spacer></v-spacer>
								<v-btn depressed @click="addNewPrice()"> Add more prices </v-btn>
							</v-col>
						</v-row>
						<v-row v-if="productForm.prices.length > 0"  v-for="(price,index) in productForm.prices" :key="index">
							<v-col cols="12" sm="3">
								<v-text-field label="Qty" placeholder="Puoduct Quantity" v-model="price.quantity" outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="2">
								<v-text-field label="Base Price" placeholder="Puoduct MRP" v-model="price.base_price" outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="2">
								<v-text-field label="Offer Price" placeholder="Special Price" v-model="price.special_price" outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="2">
								<date-picker label="Offer start date" :propdate="price.offer_start_date" @dateevent="(newdate) => {price.offer_start_date = newdate}"/>
							</v-col>
							<v-col cols="12" sm="2">
								<date-picker label="Offer end date" :propdate="price.offer_end_date" @dateevent="(newdate) => {price.offer_end_date = newdate}"/>
							</v-col>
							<v-col cols="12" sm="1">
								<v-btn icon color="primary" v-if="index != 0" @click="removePrice(index)">
									<v-icon dark> mdi-close </v-icon>
								</v-btn>
							</v-col>
						</v-row>
					</v-tab-item>


					<v-tab-item>
						<v-row>
							<v-col cols="2">
								<h3>Inventory</h3>
							</v-col>
							<v-col cols="7"></v-col>
							<v-col cols="3">
								<v-select v-model="selected_source" :items="source" :menu-props="{ maxHeight: '250' }" item-text="title" item-value="id" label="Sources" multiple dense outlined>
									<template v-slot:selection="{ item, index }">
						        <span v-if="index === 0" class="grey--text caption">
						          {{selected_source.length}} Source selected
						        </span>
						      </template>
								</v-select>
							</v-col>
						</v-row>
						<v-row v-if="productForm.inventories.length > 0"  v-for="(inventory,index) in productForm.inventories" :key="index">
							<v-col cols="12" md="6">
								<v-text-field label="Source" v-model="inventory.source_title" placeholder="Inventory source" readonly outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="6">
								<v-text-field label="Stock" placeholder="Puoduct Stock" v-model="inventory.quantity" type="number" min="0" outlined dense required></v-text-field>
							</v-col>
						</v-row>
					</v-tab-item>



					<v-tab-item>
						<v-row>
							<v-col cols="12">
								<h3>Images</h3>
							</v-col>
							<template v-if="productForm.images.length > 0">
								<image-upload :mdprops="4" :lgprops="4" :xlprops="4" v-for="(image,index) in productForm.images" :labelprops="imageLabel(image.type)" :key="index" @imageevent="(newimage) => {image.image = newimage}"/>
							</template>
						</v-row>
					</v-tab-item>



					<v-tab-item>
						<v-row>
						 <v-col cols="12">
							 <h3>Product Categories</h3>
						 </v-col>
						 <v-col cols="12" md="4">
							 <v-treeview v-model="selected_categories" :items="categories" selection-type="independent" selected-color="purple" selectable return-object open-all>
								 <template v-slot:label="{ item, open }">
									 {{item.title}}
								 </template>
							 </v-treeview>
						 </v-col>
						 <v-col cols="12" md="8">
							 <template v-if="!selected_categories.length">
								 No nodes selected.
							 </template>
							 <template v-else>
								 <div v-for="node in selected_categories" :key="node.id">
									 {{ node.title }}
								 </div>
							 </template>
						 </v-col>
					 </v-row>
					</v-tab-item>


					<v-tab-item>
						<v-row>
						 <v-col cols="12">
							 <h3>Dynamic Attributes</h3>
						 </v-col>
						 <v-col cols="12">
							hello
						 </v-col>
					 </v-row>
					</v-tab-item>

		    </v-tabs-items>


				<v-row>
					<v-col cols="12">
						<v-btn color="primary" class="mr-4" type="submit"> Submit </v-btn>
					</v-col>
				</v-row>
			</v-container>

	  </v-form>

	</app-layout>
</template>



<script>
    import AppLayout from './../../../Layouts/AppLayout'
		import Currency from './../../../Mixins/Currency'
		import DatePicker from './Fields/DatePicker'
		import ImageUpload from './Fields/ImageUpload'
    export default {
			mixins: [Currency],
      components: {
        AppLayout,
				DatePicker,
				ImageUpload
      },
			data() {
				return {
					valid:true,
					tab: null,
					source : [],
					selected_source :[],
					categories: [],
					selected_categories : [],
					//productForm
					productForm: this.$inertia.form({
						status : true,
						sku : '',
						title : '',
						small_description : null,
						description : '',
						slug : '',
						meta_title : '',
						meta_description : '',
						meta_image : null,
						prices: [
							{
								quantity : 1,
								base_price : 0,
								special_price : 0,
								offer_start_date : '',
								offer_end_date :'',
							}
						],
						inventories : [],
						images : [ { type : 0,	image : null },	{	type : 1,	image : null },	{	type : 2,	image : null } ],
					}, {
							bag: 'createCatalogProductForm',
							resetOnSuccess: true,
					}),
				}
			},
			mounted () {
				this.getInventorySource()
				this.getTree()
			},
			watch : {
				selected_source: function (newVal, oldVal) {
					if (newVal.length > oldVal.length) {
						let def = _.difference(newVal,oldVal);
						let value = this.source.find(elem => elem.id === def[0]);
						this.productForm.inventories.push( {	source_id : value.id,	source_title : value.title,	quantity : 0 } );
					} else {
						let def = _.difference(oldVal,newVal);
						_.remove(this.productForm.inventories, {source_id: def[0]});
					}
					console.log(this.productForm.inventories);
				},
			},
			methods: {
				async getTree() {
					return await axios.get('/admin/catalog/category/tree')
						.then((response) => {
							this.categories = response.data
						})
				},
				async getInventorySource() {
					return await axios.get('/admin/catalog/inventory/list')
						.then((response) => {
							this.source = response.data.sources
						})
				},
				addNewPrice(){
					this.productForm.prices.push(
						{
							quantity : 1,
							base_price : 0,
							special_price : 0,
							offer_start_date : new Date().toISOString().substr(0, 10),
							offer_end_date : new Date().toISOString().substr(0, 10),
						}
					);
				},
				removePrice(index){
					this.productForm.prices.splice(index, 1);
				},
				imageLabel(imageType){
					switch (imageType) {
						case 0:
							return 'Small Image'
							break;
						case 1:
							return 'Thumbnail Image'
							break;
						case 2:
							return 'Base Image'
							break;
						default:
							return 'Extra Image'
					}
				},
				createProduct(){
					this.productForm.post('/admin/catalog/product/store', {
							preserveScroll: true
					}).then(() => {
						console.log("hit");
					})
					console.log(this.productForm);
				}
			}
    }
</script>


<style media="screen" scoped>
	.v-input--selection-controls {
		margin-top: 4px;
	}
</style>
