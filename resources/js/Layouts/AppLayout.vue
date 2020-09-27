<template>
  <div class="flex">
		<DashboardMenu/>
	  <div class="h-screen overflow-y-scroll flex-grow">
			<!-- Page Heading -->
			<header class="bg-white w-full p-4 shadow">
					<slot name="header"></slot>
					<form @submit.prevent="logout">
							<button type="submit" name="button">Logout</button>
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
    import DashboardMenu from './Component/Menu'
		import JetButton from './Component/Menu'
    export default {
        components: {
            DashboardMenu,
            JetButton
            // JetDropdown,
            // JetDropdownLink,
            // JetNavLink,
            // JetResponsiveNavLink,
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
