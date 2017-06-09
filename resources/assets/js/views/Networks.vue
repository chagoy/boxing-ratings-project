<template>
		<div>
			<ul v-for="network in networks">
					<li>
						<router-link tag="a" :to="{ name: 'network', params: { network: network.slug }}">{{ network.name }}</router-link>
					</li>
				</ul>
		</div>

</template>

<script>
	
	import collection from '../mixins/collection';

	export default {

		mixins: [collection],

		data() {
			return {
				networks: ''
			}
		},

		created() {
			this.fetch();
		},

		methods: {

			fetch() {
				this.getNetworks();
			},

			networks() {
				this.networks = data.networks;
			}

		}

		
	}

</script>