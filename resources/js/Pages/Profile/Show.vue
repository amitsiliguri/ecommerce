<template>
    <app-layout>
        <template #header>Profile</template>
				<v-row>
		      <v-col cols="12" sm="6">
		        <update-profile-information-form :name="$page.user.name" :email="$page.user.email" />
						<two-factor-authentication-form v-if="$page.jetstream.canManageTwoFactorAuthentication" class="mt-4" />
		      </v-col>
					<v-col cols="12" sm="6">
						<update-password-form/>
						<logout-other-browser-sessions-form :sessions="sessions" class="mt-4"/>
		      </v-col>
				</v-row>
        <!-- <delete-user-form class="mt-10 sm:mt-0" /> -->
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    // import DeleteUserForm from './DeleteUserForm'
    import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm'
    import TwoFactorAuthenticationForm from './TwoFactorAuthenticationForm'
    import UpdatePasswordForm from './UpdatePasswordForm'
    import UpdateProfileInformationForm from './UpdateProfileInformationForm'

    export default {
        props: ['sessions'],
        components: {
            AppLayout,
            // DeleteUserForm,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
        },
    }
</script>
