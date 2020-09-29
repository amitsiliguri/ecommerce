<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category
            </h2>
        </template>
        <div>
					<div class="grid grid-cols-4 gap-4">
						<div class="md:col-span-2 col-span-4 p-3">
							<Form @submitted="saveCategory">
								<template #form>

									<div class="my-2">
										<input type="checkbox" id="category_status" v-model="form.status">
										<label for="category_status" class="text-gray-500"> Status</label><br>
			            </div>

									<div class="my-2">
			                <!-- Profile Photo File Input -->
			                <input type="file" class="hidden" ref="banner" @change="uploadPhoto('banner')">
			                <jet-label for="photo" value="Banner" />
			                <!-- Current Profile Photo -->
			                <img v-if="bannerPreview" :src="bannerPreview" alt="Current Profile Photo" class="block w-full my-2">
			                <jet-secondary-button class="block w-full my-2 text-center" type="button" @click.native.prevent="selectNewPhoto('banner')">
			                    Select A Banner
			                </jet-secondary-button>
			                <jet-input-error :message="form.error('banner')" class="mt-2" />
			            </div>

									<div class="my-2">
			                <jet-label for="category_name" value="Title"/>
			                <jet-input id="category_name" type="text" class="mt-1 block w-full" v-model="form.title"/>
											<jet-input-error :message="form.error('title')" class="mt-2" />
			            </div>

									<div class="my-2">
			                <jet-label for="category_slug" value="Slug" class="mt-3"/>
			                <jet-input id="category_slug" type="text" class="mt-1 block w-full" v-model="form.slug"/>
											<jet-input-error :message="form.error('slug')" class="mt-2" />
			            </div>

									<div class="my-2">
			                <jet-label for="category_description" value="Description" class="mt-3"/>
			                <textarea id="category_description" class="mt-1 block w-full form-input rounded-md shadow-sm" rows="10" v-model="form.description"/>
											<jet-input-error :message="form.error('description')" class="mt-2" />
			            </div>

									<div class="my-2">
			                <jet-label for="meta_title" value="Meta Title" class="mt-3"/>
			                <jet-input id="meta_title" type="text" class="mt-1 block w-full" v-model="form.meta_title"/>
											<jet-input-error :message="form.error('meta_title')" class="mt-2" />
			            </div>

									<div class="my-2">
			                <jet-label for="meta_description" value="Meta Title" class="mt-3"/>
											<textarea id="meta_description" class="mt-1 block w-full form-input rounded-md shadow-sm" rows="5" v-model="form.meta_description"/>
											<jet-input-error :message="form.error('meta_description')" class="mt-2" />
			            </div>

									<div class="my-2">
			                <!-- Profile Photo File Input -->
			                <input type="file" class="hidden" ref="meta_image" @change="uploadPhoto('meta_image')">
			                <jet-label for="meta_image" value="Meta Image" />
			                <!-- Current Profile Photo -->
			                <img v-if="metaImagePreview" :src="metaImagePreview" alt="meta image" class="block w-full my-2">
			                <jet-secondary-button class="block w-full my-2 text-center" type="button" @click.native.prevent="selectNewPhoto('meta_image')">
			                    Select A Meta Photo
			                </jet-secondary-button>
			                <jet-input-error :message="form.error('meta_image')" class="mt-2" />
			            </div>
								</template>
								<template #actions>
									<jet-action-message :on="form.recentlySuccessful" class="mr-3">
			                Category Saved.
			            </jet-action-message>

			            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
			                Save
			            </jet-button>
								</template>
							</Form>
							<ul>
								<li v-for="error in form.errors()">
								    {{ error }}
								</li>
							</ul>

						</div>
						<div class="md:col-span-2 col-span-4 p-3">
							<NestedDraggable v-if="list.length > 0" :tasks="list"/>
						</div>
					</div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../../Layouts/AppLayout'
		import Form from './../../../Component/Form'
		import JetActionMessage from './../../../Jetstream/ActionMessage'
    import JetButton from './../../../Jetstream/Button'
    import JetFormSection from './../../../Jetstream/FormSection'
    import JetInput from './../../../Jetstream/Input'
    import JetInputError from './../../../Jetstream/InputError'
    import JetLabel from './../../../Jetstream/Label'
		import JetSecondaryButton from './../../../Jetstream/SecondaryButton'
		import NestedDraggable from "./Tree";
    export default {
        components: {
            AppLayout,
						Form,
						JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
						NestedDraggable,
						JetSecondaryButton,
        },
				data() {
    			return {
						form: this.$inertia.form({
								id : null,
								status: true,
								title: '',
								slug: '',
								description : '',
								banner : null,
								meta_title : '',
								meta_description : '',
								meta_image : null
						}, {
								bag: 'saveCategory',
								resetOnSuccess: true,
						}),
						bannerPreview: null,
						metaImagePreview: null,
			      list: []
			    };
  			},
				mounted () {
					// console.log("hello");
					this.getTree()
				},
				methods:{
					uploadPhoto(type){
						const reader = new FileReader();
						reader.onload = (e) => {
							if (type == 'banner') {
								this.bannerPreview = e.target.result;
							} else if (type == 'meta_image') {
								this.metaImagePreview = e.target.result;
							}
						};
						if (type == 'banner') {
							reader.readAsDataURL(this.$refs.banner.files[0]);
						} else if (type == 'meta_image') {
							reader.readAsDataURL(this.$refs.meta_image.files[0]);
						}
					},
					selectNewPhoto(type) {
						if (type == 'banner') {
							this.$refs.banner.click();
						}else if (type == 'meta_image') {
							this.$refs.meta_image.click();
						}
					},
					saveCategory(){
						let self = this
						if (this.$refs.banner) {
								this.form.banner = this.$refs.banner.files[0]
						}
						if (this.$refs.meta_image) {
								this.form.meta_image = this.$refs.meta_image.files[0]
						}
						this.form.post('/admin/catalog/category/store', {
								preserveScroll: true
						}).then(() => {
								this.bannerPreview = null
								this.metaImagePreview = null
								this.$refs.banner.files[0] = null
								this.$refs.meta_image.files[0] = null
								this.getTree()
						});
					},
					getTree() {
						return axios.get('/admin/catalog/category/tree')
							.then(response => {
									this.list = response.data
									console.log(this.list);
							})
					},
				}
    }
</script>
