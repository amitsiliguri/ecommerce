<template>
	<v-col cols="12">
		<v-form ref="form" @submit.prevent="createApiToken">
				<v-card outlined>
					<!-- title -->
					<v-card-title>
						Create API Token
					</v-card-title>
					<!-- sub title -->
					<v-card-subtitle class="pb-0">
						API tokens allow third-party services to authenticate with our application on your behalf.
					</v-card-subtitle>
					<v-divider class="my-4" />
					<!-- inputs -->
					<v-card-text class="text--primary">
						<v-text-field v-model="createApiTokenForm.name" :error-messages="createApiTokenForm.error('name')" label="Name" outlined dense required autofocus></v-text-field>
						<v-select v-model="createApiTokenForm.permissions" :items="availablePermissions" label="Permissions" multiple outlined dense></v-select>
					</v-card-text>
					<v-divider class="mb-4" />
					<!-- submit -->
					<v-card-actions>
						<v-btn :disabled="createApiTokenForm.processing" color="primary" type="submit">
							Save
						</v-btn>
						<span v-show="createApiTokenForm.recentlySuccessful"> Saved. </span>
					</v-card-actions>
				</v-card>
		</v-form>




		<v-card outlined class="mt-4" v-if="tokens.length > 0">
			<!-- title -->
			<v-card-title>
				Manage API Tokens
			</v-card-title>
			<!-- sub title -->
			<v-card-subtitle class="pb-0">
				You may delete any of your existing tokens if they are no longer needed.
			</v-card-subtitle>
			<!-- inputs -->
			<v-card-text class="text--primary">
				<v-list two-line>
					<template v-for="(token,index) in tokens">
						<v-list-item :key="index" outlined>
							<v-list-item-content>
								<v-list-item-title> {{ token.name }}</v-list-item-title>
								<v-list-item-subtitle v-if="token.last_used_at"> Last used {{ fromNow(token.last_used_at) }} </v-list-item-subtitle>
							</v-list-item-content>
							<v-list-item-icon>

								<v-menu bottom left>
								  <template v-slot:activator="{ on, attrs }">
								    <v-btn icon v-bind="attrs" v-on="on">
								      <v-icon>mdi-dots-vertical</v-icon>
								    </v-btn>
								  </template>
								  <v-list>
								    <v-list-item link @click="manageApiTokenPermissions(token)" v-if="availablePermissions.length > 0">
			                <v-list-item-title>Permissions</v-list-item-title>
			              </v-list-item>
										<v-list-item link @click="confirmApiTokenDeletion(token)">
			                <v-list-item-title>Delete</v-list-item-title>
			              </v-list-item>
			            </v-list>
			          </v-menu>
							</v-list-item-icon>
						</v-list-item>
					</template>
				</v-list>
			</v-card-text>
		</v-card>



		<!-- copy token -->
		<v-dialog v-model="displayingToken" persistent max-width="600px">
      <v-card>
				<v-card-title class="headline">
          API Token
        </v-card-title>
				<v-card-subtitle>
		      Please copy your new API token. For your security, it won't be shown again.
		    </v-card-subtitle>

				<v-divider class="mb-4"></v-divider>

        <v-card-text>
        	<p v-if="$page.jetstream.flash.token"> {{ $page.jetstream.flash.token }} </p>
					<p v-else> No token to display </p>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="displayingToken = false">
            Close
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>


		<!-- API Token Permissions Modal -->
		<v-dialog v-model="managingPermissionsModal" persistent max-width="600px">
			<v-card>
				<v-card-title class="headline">
					API Token Permissions
				</v-card-title>
				<v-divider class="mb-4"></v-divider>
				<v-card-text>
						<v-select v-model="updateApiTokenForm.permissions" :items="availablePermissions" label="Permissions" multiple outlined dense></v-select>
				</v-card-text>
				<v-card-actions>
					<v-spacer></v-spacer>
					<v-btn color="green darken-1" text @click="managingPermissionsModal = false">
						Nevermind
					</v-btn>
					<v-btn color="green darken-3" text @click="updateApiToken" :disabled="updateApiTokenForm.processing">
						Save
					</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>


		<!-- API Token Permissions Modal -->
		<v-dialog v-model="apiTokenBeingDeleteModal" persistent max-width="600px">
			<v-card>
				<v-card-title class="headline">
					Delete API Token
				</v-card-title>
				<v-divider class="mb-4"></v-divider>
				<v-card-text>
					Are you sure you would like to delete this API token?
				</v-card-text>
				<v-card-actions>
					<v-spacer></v-spacer>
					<v-btn color="green darken-1" text @click="apiTokenBeingDeleteModal = false">
						Nevermind
					</v-btn>
					<v-btn color="green darken-3" text @click="deleteApiToken" :disabled="deleteApiTokenForm.processing">
						Delete
					</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>



	</v-col>
</template>

<script>

    export default {
        props: [
            'tokens',
            'availablePermissions',
            'defaultPermissions',
        ],

        data() {
            return {
                createApiTokenForm: this.$inertia.form({
                    name: '',
                    permissions: this.defaultPermissions,
                }, {
                    bag: 'createApiToken',
                    resetOnSuccess: true,
                }),

                updateApiTokenForm: this.$inertia.form({
                    permissions: []
                }, {
                    resetOnSuccess: false,
                    bag: 'updateApiToken',
                }),

                deleteApiTokenForm: this.$inertia.form(),

                displayingToken: false,
                managingPermissionsFor: null,
								managingPermissionsModal: false,
                apiTokenBeingDeleted: null,
								apiTokenBeingDeleteModal: false,
            }
        },

        methods: {
            createApiToken() {
                this.createApiTokenForm.post('/user/api-tokens', {
                    preserveScroll: true,
                }).then(response => {
                    if (! this.createApiTokenForm.hasErrors()) {
                        this.displayingToken = true
                    }
                })
            },

            manageApiTokenPermissions(token) {
                this.updateApiTokenForm.permissions = token.abilities
                this.managingPermissionsFor = token
								this.managingPermissionsModal = true
            },

            updateApiToken() {
                this.updateApiTokenForm.put('/user/api-tokens/' + this.managingPermissionsFor.id, {
                    preserveScroll: true,
                    preserveState: true,
                }).then(response => {
                    this.managingPermissionsFor = null
										this.managingPermissionsModal = false
                })
            },

            confirmApiTokenDeletion(token) {
                this.apiTokenBeingDeleted = token
								this.apiTokenBeingDeleteModal = true
            },

            deleteApiToken() {
                this.deleteApiTokenForm.delete('/user/api-tokens/' + this.apiTokenBeingDeleted.id, {
                    preserveScroll: true,
                    preserveState: true,
                }).then(() => {
										this.apiTokenBeingDeleteModal = false
                    this.apiTokenBeingDeleted = null
                })
            },

            fromNow(timestamp) {
                return moment(timestamp).local().fromNow()
            },
        },
    }
</script>
