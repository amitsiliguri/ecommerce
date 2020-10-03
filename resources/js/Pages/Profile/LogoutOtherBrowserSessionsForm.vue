<template>
		<v-card outlined>
			<v-card-title>
	      Browser Sessions
	    </v-card-title>
			<v-card-subtitle class="pb-0">
	      Manage and logout your active sessions on other browsers and devices.
	    </v-card-subtitle>
			<v-card-text class="text--primary">
				<p>  If necessary, you may logout of all of your other browser sessions across all of your devices. If you feel your account has been compromised, you should also update your password.</p>

				<template v-if="sessions.length > 0">
					<v-list two-line>

		        <v-list-item v-for="(session,index) in sessions" :key="index">
		          <v-list-item-avatar size="62" color="indigo">
								<v-icon dark v-if="session.agent.is_desktop">mdi-laptop</v-icon>
								<v-icon dark v-else>mdi-tablet-cellphone </v-icon>
		          </v-list-item-avatar>
		          <v-list-item-content>
		            <v-list-item-title> {{ session.agent.platform }} - {{ session.agent.browser }} - {{ session.ip_address }} </v-list-item-title>
								<v-list-item-subtitle>
									<span v-if="session.is_current_device" class="green--text darken-1">This device</span>
									<span v-else>Last active {{ session.last_active }}</span>
								</v-list-item-subtitle>
		          </v-list-item-content>
		        </v-list-item>

			    </v-list>
				</template>
	    </v-card-text>

			<v-card-actions>
				<v-btn color="primary" @click="confirmLogout">
					Logout Other Browser Sessions
				</v-btn>

				<v-dialog v-model="confirmingLogout" persistent max-width="600px">
		      <v-card>
						<v-card-title class="headline">
		          Logout Other Browser Sessions
		        </v-card-title>
						<v-card-subtitle>
				      Please enter your password to confirm you would like to logout of your other browser sessions across all of your devices.
				    </v-card-subtitle>
		        <v-card-text>
		        	<v-text-field v-model="form.password" :counter="20" :error-messages="form.error('password')" ref="password" label="Password" type="password" outlined dense required @keyup.enter.native="logoutOtherBrowserSessions"></v-text-field>
		        </v-card-text>
		        <v-card-actions>
		          <v-spacer></v-spacer>
		          <v-btn color="green darken-1" text @click="confirmingLogout = false" :disabled="form.processing">
		            Nevermind
		          </v-btn>
		          <v-btn color="green darken-2" text @click.native="logoutOtherBrowserSessions" :disabled="form.processing">
		            Confirm
		          </v-btn>
		        </v-card-actions>
		      </v-card>
		    </v-dialog>



	    </v-card-actions>
		</v-card>

</template>



<script>
    export default {
        props: ['sessions'],
        data() {
            return {
                confirmingLogout: false,

                form: this.$inertia.form({
                    '_method': 'DELETE',
                    password: '',
                }, {
                    bag: 'logoutOtherBrowserSessions'
                })
            }
        },

        methods: {
            confirmLogout() {
                this.form.password = ''
                this.confirmingLogout = true
                setTimeout(() => {
                    this.$refs.password.focus()
                }, 500)
            },

            logoutOtherBrowserSessions() {
                this.form.post('/user/other-browser-sessions', {
                    preserveScroll: true
                }).then(response => {
                    if (! this.form.hasErrors()) {
                        this.confirmingLogout = false
                    }
                })
            },
        },
    }
</script>
