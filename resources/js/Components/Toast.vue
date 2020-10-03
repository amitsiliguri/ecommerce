<template>
  <v-snackbar v-model="snackbar" vertical>
		{{text}}
    <template v-slot:action="{ attrs }">
      <v-btn color="indigo" text v-bind="attrs" @click="snackbar = false">
        Close
      </v-btn>
    </template>
  </v-snackbar>
</template>


<script>
  export default {
    data: () => ({
      snackbar: false,
			text : ''
    }),
		watch: {
			'$page.errors': {
	      handler: function (after, before) {
					if (Object.keys(after).length > 0) {
						this.text = 'Something went wrong with your action, please check.'
						this.snackbar = true
					}
	      },
	      deep: true,
	    },
	    '$page.message': {
	      handler: function (after, before) {
						if (after.error) {
							this.text = after.error
							this.snackbar = true
						} else if(after.success){
							this.text = after.success
							this.snackbar = true
						} else if(after.status){
							this.text = after.status
							this.snackbar = true
						}
	      },
	      deep: true,
	    },
	  },
  }
</script>
