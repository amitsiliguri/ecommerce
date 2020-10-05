<template>
    <app-layout>
        <template #header>Edit Categories</template>
				<v-row>
		      <v-col cols="12" sm="4">
		        <categorytree ref="categoryTree" type="edit"/>
		      </v-col>
					<v-col cols="12" sm="8">
						<v-form ref="editCategoryForm" v-model="valid" @submit.prevent="editCategory">
							<v-expansion-panels accordion focusable multiple v-model="panel" outlined>
						    <v-expansion-panel active>
						      <v-expansion-panel-header>
						        General
						      </v-expansion-panel-header>
						      <v-expansion-panel-content>
										<v-switch v-model="categoryForm.status" :label="statusLable"></v-switch>
										<v-text-field :rules="titleRule" :counter="60" label="Title" outlined dense required v-model="categoryForm.title" :error-messages="categoryForm.error('title')"></v-text-field>
										<v-file-input label="Banner" accept="image/png, image/jpeg, image/jpg" outlined dense v-model="categoryForm.banner" :error-messages="categoryForm.error('banner')" @change="featuredImagePreview"></v-file-input>

										<v-img v-if="bannerPreview" max-height="350" max-width="750" :src="bannerPreview" class="mb-6"></v-img>
										<v-img v-else max-height="350" max-width="750" :src="bannerUrl" class="mb-6"></v-img>

										<v-textarea outlined :counter="300" label="Description" v-model="categoryForm.description" :error-messages="categoryForm.error('description')"></v-textarea>
						      </v-expansion-panel-content>
						    </v-expansion-panel>
								<v-expansion-panel>
						      <v-expansion-panel-header>
						        SEO
						      </v-expansion-panel-header>
						      <v-expansion-panel-content>
										<v-text-field :rules="titleRule" :counter="60" label="Slug" class="mt-4" v-model="sluginput" :hint="savedSlug" outlined dense required :error-messages="categoryForm.error('slug')"></v-text-field>
										<v-text-field :counter="50" label="Meta Title" outlined dense required v-model="categoryForm.meta_title" :error-messages="categoryForm.error('meta_title')"></v-text-field>
										<v-file-input label="Meta Image" accept="image/png, image/jpeg, image/jpg" outlined dense v-model="categoryForm.meta_image" :error-messages="categoryForm.error('meta_image')" @change="categoryMetaImagePreview"></v-file-input>

										<v-img v-if="metaImagePreview" max-height="662" max-width="1000" :src="metaImagePreview" class="mb-6"></v-img>
										<v-img v-else max-height="662" max-width="1000" :src="metaImageUrl" class="mb-6"></v-img>

										<v-textarea outlined :counter="170" label="Meta Description" v-model="categoryForm.meta_description" :error-messages="categoryForm.error('meta_description')"></v-textarea>
						      </v-expansion-panel-content>
						    </v-expansion-panel>
						  </v-expansion-panels>
							<v-btn color="primary" type="submit" class="my-4" :disabled="!valid || categoryForm.processing">
								Update
							</v-btn>
						</v-form>
		      </v-col>
				</v-row>
    </app-layout>
</template>

<script>
    import AppLayout from './../../../Layouts/AppLayout'
		import categorytree from './Sortabletree'
    export default {
        components: {
            AppLayout,
						categorytree
        },
				props: {
			    category: Object,
			  },
				data() {
					return {
						panel: [0,1],
						valid : false,
						categoryForm: this.$inertia.form({
								'_method': 'PUT',
								status: this.category.status,
								title: this.category.title,
								slug: '',
								description : this.category.description,
								banner : null,
								meta_title : this.category.meta_title,
								meta_description : this.category.meta_description,
								meta_image : null
						}, {
								bag: 'saveCategory',
								resetOnSuccess: false,
						}),
						bannerPreview: null,
						metaImagePreview: null,
						bannerUrl: this.category.banner,
						metaImageUrl: this.category.meta_image,
						sluginput : this.category.slug,
						titleRule: [
							value => !!value || 'Required.',
							value => (value || '').length <= 60 || 'Max 60 characters',
						],
						slugRule: [
							value => !!value || 'Required.',
							value => (value || '').length <= 60 || 'Max 60 characters',
						],
					}
		    },
				computed : {
					statusLable: function () {
					 return (this.categoryForm.status) ? "Enable" : "Disable"
					},
					savedSlug: function () {
						return this.sluginput.trim().toLowerCase().split(/\s+/).join('-');
					}
				},
				methods: {
            editCategory() {
								this.categoryForm.slug = this.savedSlug
								let url = '/admin/catalog/category/update/' + this.category.id
                this.categoryForm.post(url, {
                    preserveScroll: true
                }).then(() => {
									this.$refs.editCategoryForm.resetValidation()
									this.$refs.categoryTree.getTree()
                })
            },
						featuredImagePreview (){
							if (this.categoryForm.banner != null) {
								const file = this.categoryForm.banner
	      				this.bannerPreview = URL.createObjectURL(file)
							}else {
								this.bannerPreview = null
							}
						},
						categoryMetaImagePreview (){
							if (this.categoryForm.meta_image != null) {
								const file = this.categoryForm.meta_image
	      				this.metaImagePreview = URL.createObjectURL(file)
							}else {
								this.metaImagePreview = null
							}
						}
        },
    }
</script>
