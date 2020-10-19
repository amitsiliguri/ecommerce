<template>
  <v-row justify="center">
		<span @click="startConfirmingPassword"><slot/></span>
    <v-dialog v-model="confirmingPassword" persistent max-width="600px">
      <v-card>
				<v-card-title class="headline">
          Confirm Password
        </v-card-title>
				<v-card-subtitle>
		      For your security, please confirm your password to continue.
		    </v-card-subtitle>
        <v-card-text>
        	<v-text-field v-model="form.password" :counter="20" :error-messages="form.error" ref="password" label="Password" type="password" outlined dense required @keyup.enter.native="confirmPassword"></v-text-field>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="confirmingPassword = false" :disabled="form.processing">
            Nevermind
          </v-btn>
          <v-btn color="green darken-2" text @click.native="confirmPassword" :disabled="form.processing">
            Confirm
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
    export default {
        data() {
            return {
                confirmingPassword: false,
                form: this.$inertia.form({
                    password: '',
                    error: '',
                }, {
                    bag: 'confirmPassword',
                })
            }
        },

        methods: {
            startConfirmingPassword() {
                this.form.error = '';

                axios.get('/admin/user/confirmed-password-status').then(response => {
                    if (response.data.confirmed) {
                        this.$emit('confirmed');
                    } else {
                        this.confirmingPassword = true;
                        this.form.password = '';

                        setTimeout(() => {
                            this.$refs.password.focus()
                        }, 250)
                    }
                })
            },

            confirmPassword() {
                this.form.processing = true;
                axios.post('/admin/user/confirm-password', {
                    password: this.form.password,
                }).then(response => {
                    this.confirmingPassword = false;
                    this.form.password = '';
                    this.form.error = '';
                    this.form.processing = false;
                    this.$nextTick(() => this.$emit('confirmed'));
                }).catch(error => {
                    this.form.processing = false;
                    this.form.error = error.response.data.errors.password[0];
                });
            }
        }
    }
</script>
