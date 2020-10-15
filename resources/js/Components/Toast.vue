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
		props: {
        message: {
            type: Object,
            required: true
        },
				errors: {
					type: Object,
					required: true
				}
    },
		created () {
			this.showMessage()
		},
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
	      handler: function () {
					this.showMessage()
	      },
	      deep: true,
	    },
	  },
		methods : {
			showMessage() {
				if (this.message.error) {
					this.text = this.message.error
					this.snackbar = true
				} else if(this.message.success){
					this.text = this.message.success
					this.snackbar = true
				} else if(this.message.status){
					this.text = this.message.status
					this.snackbar = true
				}
			}
		}
  }
</script>
