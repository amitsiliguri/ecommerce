<template>
	<div class="h-screen bg-gray-900 w-20">
		<template v-if="menu.length > 0">
			<MenuItem  v-for="(item,index) in menu" :item="item" :key="index"/>
		</template>
	</div>
</template>


<script>
    import MenuItem from './Item'
    export default {
        components: {
            MenuItem
        },
        data() {
            return {
                menu: [
									{
										name : 'Dashboard',
										icon : 'mdi-view-dashboard',
										children : [
											{
												name : 'Home',
												type : 'link',
												link : '/admin/dashboard',
												routename : 'dashboard'
											},
											{
												name : 'Profile',
												type : 'link',
												link : '/admin/user/profile',
												routename : 'profile.show'
											}
										]
									},
									{
										name : 'Catalog',
										icon : 'mdi-application-settings',
										children : [
											{
												name : 'Category',
												type : 'link',
												link : '/admin/catalog/category',
												routename : 'catalog.category'
											},
											{
												name : 'Product',
												type : 'link',
												link : '/admin/catalog/products',
												routename : 'catalog.products'
											}
										]
									}
								],
            }
        },
    }
</script>
