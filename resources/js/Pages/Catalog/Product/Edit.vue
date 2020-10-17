<template>
	<app-layout>
		<template #header>{{product.title}}</template>
		<pre>
			{{product}}
		</pre>


	</app-layout>
</template>

<script>
  import AppLayout from './../../../Layouts/AppLayout'
  export default {
    components: {
      AppLayout
    },
		props: {
			product: Object,
		},
  }
</script>
