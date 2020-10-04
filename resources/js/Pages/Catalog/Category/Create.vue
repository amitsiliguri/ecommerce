<template>
    <app-layout>
        <template #header>Categories</template>
				<v-row>
		      <v-col cols="12" sm="5">
		        left
		      </v-col>
					<v-col cols="12" sm="7">
						<v-expansion-panels accordion focusable multiple v-model="panel">
					    <v-expansion-panel active>
					      <v-expansion-panel-header>
					        Item
					      </v-expansion-panel-header>
					      <v-expansion-panel-content>
					        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					      </v-expansion-panel-content>
					    </v-expansion-panel>

							<v-expansion-panel>
					      <v-expansion-panel-header>
					        Item
					      </v-expansion-panel-header>
					      <v-expansion-panel-content>
					        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					      </v-expansion-panel-content>
					    </v-expansion-panel>

							<v-expansion-panel>
					      <v-expansion-panel-header>
					        Item
					      </v-expansion-panel-header>
					      <v-expansion-panel-content>
					        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					      </v-expansion-panel-content>
					    </v-expansion-panel>

							<v-expansion-panel>
					      <v-expansion-panel-header>
					        Item
					      </v-expansion-panel-header>
					      <v-expansion-panel-content>
					        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					      </v-expansion-panel-content>
					    </v-expansion-panel>

					  </v-expansion-panels>
		      </v-col>
				</v-row>
    </app-layout>
</template>

<script>
    import AppLayout from './../../../Layouts/AppLayout'


    export default {
        props: ['sessions'],
        components: {
            AppLayout
        },
				data: () => ({
		      panel: [0],
		    }),
    }
</script>
