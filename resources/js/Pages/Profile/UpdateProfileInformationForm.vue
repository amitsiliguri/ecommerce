<template>
	<v-form ref="form" v-model="valid" @submit.prevent="updateProfileInformation">
			<v-card outlined>
				<v-card-title>
		      Profile Information
		    </v-card-title>
				<v-card-subtitle class="pb-0">
		      Update your account's profile information and email address.
		    </v-card-subtitle>
				<v-card-text class="text--primary">
					<v-avatar size="64" class="mb-4" v-if="$page.jetstream.managesProfilePhotos">
						<img v-if="! photoPreview" :src="$page.user.profile_photo_url" alt="Current Profile Photo">
						<img v-else :src="photoPreview" alt="New Profile Photo">
					</v-avatar>
					<v-file-input label="Image Upload" accept="image/png, image/jpeg, image/jpg" outlined dense v-model="form.photo" @change="updatePhotoPreview"></v-file-input>
					<v-text-field v-model="form.name" :counter="20" :rules="nameRules" :error-messages="form.error('name')" label="Name" outlined dense required></v-text-field>
					<v-text-field v-model="form.email" :rules="emailRules" label="E-mail" :error-messages="form.error('email')" outlined dense required></v-text-field>
		    </v-card-text>
				<v-card-actions>
					<v-btn :disabled="!valid || form.processing" color="primary" type="submit">
						Save
					</v-btn>
					<span v-show="form.recentlySuccessful"> Saved. </span>
		    </v-card-actions>
			</v-card>
	</v-form>
</template>

<script>
    export default {
        props: ['name', 'email'],
        data() {
            return {
				valid: true,
				nameRules: [
					v => !!v || 'Name is required',
					v => (v && v.length <= 20) || 'Name must be less than 20 characters',
				],
				emailRules: [
					v => !!v || 'E-mail is required',
					v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
				],
                form: this.$inertia.form({
                    '_method': 'PUT',
                    name: this.name,
                    email: this.email,
                    photo: null,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
                photoPreview: null,
            }
        },

        methods: {
            updateProfileInformation() {
                this.form.post('/admin/user/profile-information', {
                    preserveScroll: true
                }).then(response => {
                    if (! this.form.hasErrors()) {
                        this.form.photo = null
						this.photoPreview = null
                    }
                });
            },
            updatePhotoPreview() {
				if (this.form.photo != null) {
					const file = this.form.photo
					this.photoPreview = URL.createObjectURL(file)
				}else {
					this.photoPreview = null
				}
            },
            deletePhoto() {
                this.$inertia.delete('/admin/user/profile-photo', {
                    preserveScroll: true,
                }).then(() => {
                    this.photoPreview = null
                });
            },
        },
    }
</script>
