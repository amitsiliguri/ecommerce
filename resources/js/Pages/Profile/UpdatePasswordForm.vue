<template>
	<v-form ref="passwordUpdateForm" v-model="valid" lazy-validation @submit.prevent="updatePassword">
			<v-card outlined>
				<v-card-title>
		      Update Password
		    </v-card-title>
				<v-card-subtitle class="pb-0">
		      Ensure your account is using a long, random password to stay secure.
		    </v-card-subtitle>
				<v-card-text class="text--primary">
					<v-text-field v-model="form.current_password" :rules="currentPasswordrules" :counter="20" :error-messages="form.error('current_password')" label="Current Password" type="password" outlined dense required></v-text-field>
					<v-text-field v-model="form.password" :counter="20" :rules="newPasswordrules" :error-messages="form.error('password')" label="New Password" type="password" outlined dense required></v-text-field>
					<v-text-field v-model="form.password_confirmation" :rules="confirmPasswordrules" :counter="20" :error-messages="form.error('password_confirmation')" label="Confirm Password" type="password" outlined dense required></v-text-field>
		    </v-card-text>
				<v-card-actions>
					<v-btn :disabled="!valid || form.processing" color="primary" type="submit">
						Update {{valid}}
					</v-btn>
					<span v-show="form.recentlySuccessful" class="ml-4"> Updated. </span>
		    </v-card-actions>
			</v-card>
	</v-form>
</template>

<script>
    export default {
        data() {
            return {
							valid: true,
              form: this.$inertia.form({
                  current_password: '',
                  password: '',
                  password_confirmation: '',
              }, {
                  bag: 'updatePassword',
              }),
							currentPasswordrules: [
				        value => !!value || 'Required.',
				        value => (value || '').length <= 20 || 'Max 20 characters',
								value => (value || '').length >= 8 || 'Min 8 characters',
				      ],
							newPasswordrules: [
				        value => !!value || 'Required.',
				        value => (value || '').length <= 20 || 'Max 20 characters',
								value => (value || '').length >= 8 || 'Min 8 characters',
				      ],
							confirmPasswordrules: [
				        value => !!value || 'Required.',
				        value => (value || '').length <= 20 || 'Max 20 characters',
								value => (value || '').length >= 8 || 'Min 8 characters',
				      ],
            }
        },
        methods: {
            updatePassword() {
                this.form.put('/admin/user/password', {
                    preserveScroll: true
                }).then(() => {
										this.$refs.passwordUpdateForm.resetValidation()
                })
            },
        },
    }
</script>
