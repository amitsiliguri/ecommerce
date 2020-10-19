<template>
		<v-card outlined>
			<v-card-title>
	      Two Factor Authentication
	    </v-card-title>
			<v-card-subtitle>
	      Add additional security to your account using two factor authentication.
	    </v-card-subtitle>
			<v-card-text class="text--primary">
				<p>
					<template v-if="twoFactorEnabled">You have enabled two factor authentication.</template>
					<template v-else>You have not enabled two factor authentication.</template>
				</p>
				<p>When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.</p>
				<template v-if="twoFactorEnabled">
					<template v-if="qrCode">
						<b>	Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application. </b>
						<div v-html="qrCode"></div>
					</template>
					<template v-if="recoveryCodes.length > 0">
						<p>	Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost. </p>
						<div v-for="code in recoveryCodes">
								{{ code }}
						</div>
					</template>
				</template>
	    </v-card-text>
			<v-card-actions>
				<template v-if="! twoFactorEnabled">
					<confirm-password @confirmed="enableTwoFactorAuthentication">
						<v-btn color="primary" dark :disabled="enabling">
				      Enable
				    </v-btn>
					</confirm-password>
				</template>
				<template v-else>
					<!-- Regenerate Recovery Codes -->
					<confirm-password @confirmed="regenerateRecoveryCodes">
						<v-btn color="primary" dark v-if="recoveryCodes.length > 0">
				      Regenerate Recovery Codes
				    </v-btn>
					</confirm-password>
					<!-- Show Recovery Codes -->
					<confirm-password @confirmed="showRecoveryCodes">
						<v-btn color="primary" dark v-if="recoveryCodes.length == 0">
				      Show Recovery Codes
				    </v-btn>
					</confirm-password>
					<!-- Disable -->
					<confirm-password @confirmed="disableTwoFactorAuthentication">
						<v-btn color="primary" dark v-if="recoveryCodes.length > 0" :disabled="disabling">
				      Disable
				    </v-btn>
					</confirm-password>
				</template>
			</v-card-actions>
		</v-card>
</template>

<script>
    import confirmPassword from './../../Components/ConfirmPassword'
    export default {
        components: {
            confirmPassword,
        },
				data: () => ({
					enabling: false,
					disabling: false,
					qrCode: null,
					recoveryCodes: [],
		    }),
				computed: {
            twoFactorEnabled() {
                return ! this.enabling && this.$page.user.two_factor_enabled
            }
        },
				methods: {
            enableTwoFactorAuthentication() {
                this.enabling = true

                this.$inertia.post('/admin/user/two-factor-authentication', {}, {
                    preserveScroll: true,
                }).then(() => {
                    return Promise.all([
                        this.showQrCode(),
                        this.showRecoveryCodes()
                    ])
                }).then(() => {
                    this.enabling = false
                })
            },

            showQrCode() {
                return axios.get('/admin/user/two-factor-qr-code')
                        .then(response => {
                            this.qrCode = response.data.svg
                        })
            },

            showRecoveryCodes() {
                return axios.get('/admin/user/two-factor-recovery-codes')
                        .then(response => {
                            this.recoveryCodes = response.data
                        })
            },

            regenerateRecoveryCodes() {
                axios.post('/admin/user/two-factor-recovery-codes')
                        .then(response => {
                            this.showRecoveryCodes()
                        })
            },

            disableTwoFactorAuthentication() {
                this.disabling = true

                this.$inertia.delete('/admin/user/two-factor-authentication', {
                    preserveScroll: true,
                }).then(() => {
                    this.disabling = false
                })
            },
        },
    }
</script>
