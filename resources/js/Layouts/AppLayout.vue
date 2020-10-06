<template>
	<v-app id="inspire">

		<v-app-bar app flat fixed clipped-left>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>
				<slot name="header"></slot>
			</v-toolbar-title>
			<v-spacer></v-spacer>
			<v-menu offset-y>
	      <template v-slot:activator="{ on, attrs }">
					<v-btn icon x-large v-bind="attrs" v-on="on" v-if="$page.jetstream.managesProfilePhotos">
						<v-avatar size="32">
				      <img :src="$page.user.profile_photo_url" :alt="$page.user.name">
	    			</v-avatar>
					</v-btn>
	        <v-btn color="primary" dark depressed v-else v-bind="attrs" v-on="on">
	          {{$page.user.name}}
	        </v-btn>
	      </template>
	      <v-list>

					<inertia-link href="/user/profile">
		        <v-list-item link>
		          <v-list-item-title>Profile</v-list-item-title>
		        </v-list-item>
					</inertia-link>

					<inertia-link href="/user/api-tokens" v-if="$page.jetstream.hasApiFeatures">
						<v-list-item link>
		          <v-list-item-title>API Token</v-list-item-title>
		        </v-list-item>
					</inertia-link>

					<v-list-item link @click="logout">
						<v-list-item-title>Logout</v-list-item-title>
					</v-list-item>

	      </v-list>
    	</v-menu>
    </v-app-bar>

		<v-navigation-drawer v-model="drawer" clipped temporary fixed>
			<v-list dense nav>
				<!-- dashboard -->
				<inertia-link href="/admin/dashboard">
					<v-list-item link>
						<v-list-item-icon>
							<v-icon>mdi-view-dashboard</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title>Dashboard</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
		    </inertia-link>
				<!-- catalog -->
				<v-list-group :value="false" prepend-icon="mdi-store" no-action>
					<template v-slot:activator>
						<v-list-item-content>
							<v-list-item-title>Catalog</v-list-item-title>
						</v-list-item-content>
					</template>
					<!-- category -->
						<v-list-item link>
							<v-list-item-title>
								<inertia-link href="/admin/catalog/category/create">
									Categories
								</inertia-link>
							</v-list-item-title>
							<v-list-item-icon>
								<v-icon>mdi-file-tree</v-icon>
							</v-list-item-icon>
						</v-list-item>
					<!-- product -->
					<v-list-item link>
						<v-list-item-title>Products</v-list-item-title>
						<v-list-item-icon>
							<v-icon>mdi-basket</v-icon>
						</v-list-item-icon>
					</v-list-item>
					<!-- product attribute set-->
					<v-list-item link>
						<v-list-item-title>
							<inertia-link href="/admin/catalog/product/attribute/set">
								Product Attribute Set
							</inertia-link>
						</v-list-item-title>
					</v-list-item>
					<!-- product attributes-->
					<v-list-item link>
						<v-list-item-title>
								Product Attributes
						</v-list-item-title>
					</v-list-item>
				</v-list-group>
      </v-list>
		</v-navigation-drawer>

		<v-main>
			<v-container>
				<slot></slot>
			</v-container>
		</v-main>

		<toast/>

	</v-app>
</template>


<script>
	import toast from './../Components/Toast'
  export default {
		components: {
				toast,
		},
    data: () => ({ drawer: false }),
		methods :{
			logout() {
					axios.post('/admin/logout').then(response => {
							window.location = '/';
					})
			},
		}
  }
</script>
