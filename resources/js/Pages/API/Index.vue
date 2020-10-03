<template>
    <app-layout>
        <template #header>API Token</template>
				<v-row>
					<api-token-manager :tokens="tokens" :available-permissions="availablePermissions" :default-permissions="defaultPermissions" />
				</v-row>
    </app-layout>
</template>

<script>
    import ApiTokenManager from './ApiTokenManager'
    import AppLayout from './../../Layouts/AppLayout'
    export default {
        props: [
            'tokens',
            'availablePermissions',
            'defaultPermissions',
        ],

        components: {
            ApiTokenManager,
            AppLayout
        },
    }
</script>
