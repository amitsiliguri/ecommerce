<template>
	<app-layout>
		<template #header>{{product.title}}</template>
		<v-form ref="productCreateForm" lazy-validation v-model="valid" @submit.prevent="createProduct">
			<v-row >
				<v-col cols="2" sm="1" class="pr-0"> 
					<v-btn block large text class="mt-1" @click="back()">
						<v-icon>mdi-undo-variant</v-icon>
					</v-btn>
				</v-col>
				<v-col cols="8" sm="10" class="px-0">
					<v-tabs v-model="tab" show-arrows grow>
						<v-tab>General</v-tab>
						<v-tab>SEO</v-tab>
						<v-tab>Price</v-tab>
						<v-tab>Inventory</v-tab>
						<v-tab>Image</v-tab>
						<v-tab>Category</v-tab>
					</v-tabs>
				</v-col>
				<v-col cols="2" sm="1" class="pl-0">
					<v-btn block text type="submit" color="primary" class="mt-1" large :disabled="productForm.processing">
						<v-icon>mdi-send</v-icon>
					</v-btn>
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
							<v-text-field label="SKU" placeholder="Stock Keeping unit" v-model="productForm.sku" :error-messages="productForm.error('sku')" dense outlined></v-text-field>
						</v-col>
						<v-col cols="12" md="5">
							<v-text-field label="Title" placeholder="Product title" v-model="productForm.title" :error-messages="productForm.error('title')" dense outlined></v-text-field>
						</v-col>
						<v-col cols="12">
							<v-textarea outlined :counter="300" label="Small Description" v-model="productForm.small_description" :error-messages="productForm.error('small_description')" dense rows="4" clearable clear-icon="mdi-close-circle"></v-textarea>
						</v-col>
						<v-col cols="12">
							<v-textarea outlined :counter="300" label="Description" v-model="productForm.description" :error-messages="productForm.error('description')" dense rows="8" clearable clear-icon="mdi-close-circle"></v-textarea>
						</v-col>
					</v-row>
				</v-tab-item>
				<v-tab-item>
					<v-row>
						<v-col cols="12">
							<h3>SEO</h3>
						</v-col>
						<v-col cols="12" sm="6">
							<v-text-field :counter="60" label="Slug" v-model="productForm.slug" :error-messages="productForm.error('slug')" placeholder="Puoduct unique slug" outlined dense required></v-text-field>
						</v-col>
						<v-col cols="12" sm="6">
							<v-text-field label="Meta Title" placeholder="SEO Title" v-model="productForm.meta_title" :error-messages="productForm.error('meta_title')" dense outlined></v-text-field>
						</v-col>
						<image-upload labelprops="Meta Image" @imageevent="(newimage) => {productForm.meta_image = newimage}" :errormessages="productForm.error('meta_image')" :serverimage="this.product.meta_image"/>
						<v-col cols="12">
							<v-textarea outlined :counter="170" label="Meta Description" v-model="productForm.meta_description" :error-messages="productForm.error('meta_description')" dense rows="3" clearable clear-icon="mdi-close-circle"></v-textarea>
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
					<template v-if="productForm.prices.length > 0">
						<v-row v-for="(price,index) in productForm.prices" :key="index">
							<v-col cols="12" sm="3">
								<v-text-field label="Qty" placeholder="Puoduct Quantity" v-model="price.quantity" :error-messages="productForm.error('prices.' + index + '.quantity')" outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="2">
								<v-text-field label="Base Price" placeholder="Puoduct MRP" v-model="price.base_price" :error-messages="productForm.error('prices.' + index + '.base_price')" outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="2">
								<v-text-field label="Offer Price" placeholder="Special Price" v-model="price.special_price" :error-messages="productForm.error('prices.' + index + '.special_price')" outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="2">
								<date-picker label="Offer start date" :propdate="price.offer_start" @dateevent="(newdate) => {price.offer_start = newdate}" :errormessages="productForm.error('prices.' + index + '.offer_start')"/>
							</v-col>
							<v-col cols="12" sm="2">
								<date-picker label="Offer end date" :propdate="price.offer_end" @dateevent="(newdate) => {price.offer_end = newdate}"  :errormessages="productForm.error('prices.' + index + '.offer_end')"/>
							</v-col>
							<v-col cols="12" sm="1">
								<v-btn icon color="primary" v-if="index != 0" @click="removePrice(index)">
									<v-icon dark> mdi-close </v-icon>
								</v-btn>
							</v-col>
						</v-row>
					</template>
				</v-tab-item>
				<v-tab-item>
					<v-row>
						<v-col cols="4" sm="6" md="9">
							<h3>Inventory</h3>
						</v-col>
						<v-col cols="8" sm="6" md="3">
							<v-select v-model="selected_source" :items="sources" :menu-props="{ maxHeight: '250' }" item-text="title" item-value="id" label="Sources" multiple dense outlined>
								<template v-slot:selection="{  index }">
									<span v-if="index === 0" class="grey--text caption">
										{{selected_source.length}} Source selected
									</span>
								</template>
							</v-select>
						</v-col>
					</v-row>
					<template v-if="productForm.inventories.length > 0">
						<v-row v-for="(inventory,index) in productForm.inventories" :key="index">
							<v-col cols="12" md="6">
								<v-text-field label="Source" v-model="inventory.source_title" placeholder="Inventory source" readonly outlined dense required></v-text-field>
							</v-col>
							<v-col cols="12" sm="6">
								<v-text-field label="Stock" placeholder="Puoduct Stock" v-model="inventory.quantity" :error-messages="productForm.error('inventories.' + index + '.quantity')" type="number" min="0" outlined dense required></v-text-field>
							</v-col>
						</v-row>
					</template>
				</v-tab-item>
				<v-tab-item>
					<v-row>
						<v-col cols="12">
							<h3>Images</h3>
						</v-col>
						<template v-if="productForm.images.length > 0">
							<image-upload 
								:mdprops="4" 
								:lgprops="4" 
								:xlprops="4" 
								v-for="(image,index) in productForm.images" 
								:errormessages="productForm.error('images.' + index + '.image')" 
								:serverimage="image.imageUrl"
								:labelprops="imageLabel(image.type)" 
								:key="index" 
								@imageevent="(newimage) => {image.image = newimage}"
							/>
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
								<template v-slot:label="{ item }">
									{{item.title}}
								</template>
							</v-treeview>
						</v-col>
						<v-col cols="12" md="8">
							<template v-if="!selected_categories.length">
								No nodes selected.
							</template>
							<template v-else>
								<div v-for="(node,index) in selected_categories" :key="index">
									{{ node.title }}
								</div>
							</template>
						</v-col>
					</v-row>
				</v-tab-item>
			</v-tabs-items>
		</v-form>
	</app-layout>
</template>

<script>
  import AppLayout from './../../../Layouts/AppLayout'
  import ImageUpload from './Fields/ImageUpload'
  import DatePicker from './Fields/DatePicker'
  export default {
    components: {
		AppLayout,
		DatePicker,
		ImageUpload
    },
	props: {
		product: {
			type: Object,
			required: true
		},
		categories: {
			type: Array,
			required: true
		},
		sources: {
			type: Array,
			required: true
		},
	},
	data () {
		return {
			firstTime : true,
			valid:true,
			tab: null,
			selected_source :[],
			selected_categories: [],
			productForm: this.$inertia.form({
				'_method': 'PUT',
				status : this.product.status,
				sku : this.product.sku,
				title : this.product.title,
				small_description : this.product.small_description,
				description : this.product.description,
				slug : this.product.slug,
				meta_title : this.product.meta_title,
				meta_description : this.product.meta_description,
				meta_image : null,
				prices: this.product.prices,
				inventories : [],
				images : [],
				categories: []
			}, {
				bag: 'updateCatalogProductForm',
				resetOnSuccess: true,
			}),
		}
	},
	created: function () {
		// Product Inventory
		let tempInventory = []
		let tempSelectedSources = []
		this.product.inventories.forEach((inventory, i) => {
			let value = this.sources.find(elem => elem.id === inventory.source_id);
			tempInventory.push({
				source_id : inventory.source_id,
				source_title : value.title,
				quantity : inventory.quantity
			})
			tempSelectedSources.push(inventory.source_id)
		});
		this.productForm.inventories = tempInventory
		this.selected_source = tempSelectedSources
		// Product Images
		let tempImage = []
		this.product.images.forEach((image, i) => {
			tempImage.push({
				type : image.type,
				image : null,
				imageUrl : image.image
			})
		});
		this.productForm.images = tempImage
		// Product Categories
		this.selected_categories = this.product.categories
	},
	watch : {
		selected_source: function (newVal, oldVal) {
			if (newVal.length > oldVal.length) {
				let def = _.difference(newVal,oldVal);
				if (!this.firstTime) {
					let value = this.sources.find(elem => elem.id === def[0]);
					this.productForm.inventories.push( {
						source_id : value.id,
						source_title : value.title,
						quantity : 0
					} );
				}else{
					this.firstTime = false
				}
			} else {
				let def = _.difference(oldVal,newVal);
				_.remove(this.productForm.inventories, {source_id: def[0]});
			}
		},
	},
	methods: {
		addNewPrice(){
			this.productForm.prices.push(
				{
					quantity : 1,
					base_price : 0,
					special_price : 0,
					offer_start : new Date().toISOString().substr(0, 10),
					offer_end : new Date().toISOString().substr(0, 10),
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
		back(){
			this.$inertia.replace('/admin/catalog/product');
		}			
	}
  }
</script>
