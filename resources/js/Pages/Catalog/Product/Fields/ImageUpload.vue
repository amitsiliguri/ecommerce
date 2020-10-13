<template>
	<v-col cols="12" :sm="smprops" :md="mdprops" :lg="lgprops" :xl="xlprops">
		<v-file-input :label="labelprops" v-model="image" accept="image/png, image/jpeg, image/jpg" outlined dense></v-file-input>
		<v-img v-if="imagePreview" max-height="350" max-width="1200" :src="imagePreview"></v-img>
	</v-col>
</template>

<script>
  export default {
		props: {
        smprops: {
            type: Number,
            required: false,
						default: 12
        },
				mdprops: {
            type: Number,
            required: false,
						default: 12
        },
				lgprops: {
            type: Number,
            required: false,
						default: 12
        },
				xlprops: {
            type: Number,
            required: false,
						default: 12
        },
				labelprops: {
					type: String,
					required: false,
					default: 'Image'
				}
    },
		data: () => ({
			image : null,
      imagePreview: null,
    }),
		watch: {
        image () {
            this.$emit('imageevent', this.image);
						if (this.image != null) {
							const file = this.image
							this.imagePreview = URL.createObjectURL(file)
						}else {
							this.imagePreview = null
						}
        }
    }
  }
</script>
