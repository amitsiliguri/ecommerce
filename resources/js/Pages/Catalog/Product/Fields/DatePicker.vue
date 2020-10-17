<template>
	<v-dialog ref="dialog" v-model="modal" :return-value.sync="date" persistent width="290px">
		<template v-slot:activator="{ on, attrs }">
			<v-text-field v-model="date" :label="label" prepend-icon="mdi-calendar"	readonly outlined dense v-bind="attrs" v-on="on" :error-messages="errormessages"></v-text-field>
		</template>
		<v-date-picker v-model="date" scrollable>
			<v-spacer></v-spacer>
			<v-btn text color="primary" @click="modal = false">	Cancel </v-btn>
			<v-btn text color="primary" @click="$refs.dialog.save(date)">	OK </v-btn>
		</v-date-picker>
	</v-dialog>
</template>

<script>
  export default {
    data: () => ({
			date : new Date().toISOString().substr(0, 10),
      modal: false,
    }),
		props: {
			propdate: {
				type: String,
				required: true
			},
			label: {
				type: String,
				required: true
			},
			errormessages: {
				type: String,
				required: false
			}
    },
    watch: {
        date () {
            this.$emit('dateevent', this.date);
        },
		propdate () {
            this.date = this.propdate
        }
	},
	created : function () {
		this.date = this.propdate
	}

  }
</script>
