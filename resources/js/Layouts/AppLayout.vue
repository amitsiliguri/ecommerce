<template>
  <div class="flex">
		<div class="flex-initial h-screen text-gray-100 bg-gray-900 w-20 text-center">
			<span class="mdi mdi-view-dashboard text-3xl"></span>
			<p class="text-xs">Dashboard</p>

	  </div>
	  <div class="flex-initial h-screen overflow-y-scroll flex-grow">
			<!-- Page Heading -->
			<header class="bg-white w-full p-4 shadow">
					<slot name="header"></slot>
					<form @submit.prevent="logout">
							<jet-dropdown-link as="button">
									Logout
							</jet-dropdown-link>
					</form>
			</header>

			<!-- Page Content -->
			<main>
					<slot></slot>
			</main>

			<!-- Modal Portal -->
			<portal-target name="modal" multiple>
			</portal-target>
	  </div>
  </div>
</template>

<script>
    import JetApplicationLogo from './../Jetstream/ApplicationLogo'
    import JetApplicationMark from './../Jetstream/ApplicationMark'
    import JetDropdown from './../Jetstream/Dropdown'
    import JetDropdownLink from './../Jetstream/DropdownLink'
    import JetNavLink from './../Jetstream/NavLink'
    import JetResponsiveNavLink from './../Jetstream/ResponsiveNavLink'

    export default {
        components: {
            JetApplicationLogo,
            JetApplicationMark,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put('/current-team', {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                axios.post('/logout').then(response => {
                    window.location = '/';
                })
            },
        },

        computed: {
            path() {
                return window.location.pathname
            }
        }
    }
</script>
