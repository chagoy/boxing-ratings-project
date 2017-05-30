<template>

	<div>
		<card-form :boxers="boxers" :promoters="promoters" :networks="networks" :locations="locations" @added="fetch"></card-form>

		<boxer-form :promoters="promoters"></boxer-form>
		<location-form></location-form>
		<network-form></network-form>
		<promoter-form></promoter-form>
	</div>
	
</template>

<script>
	import CardForm from '../components/CardForm.vue';
	import BoxerForm from '../components/BoxerForm.vue';
	import LocationForm from '../components/LocationForm.vue';
	import NetworkForm from '../components/NetworkForm.vue';
	import PromoterForm from '../components/PromoterForm.vue';
	import collection from '../mixins/collection';

	export default {
		components: { CardForm, BoxerForm, LocationForm, NetworkForm, PromoterForm },

		mixins: [collection],

		data() {
			return {
				boxers: '',
				promoters: '',
				networks: '',
				locations: ''
			}
		},

		created() {
			this.fetch();
		},

		methods: {
			fetch() {
				this.getBoxers();
				this.getNetworks();
				this.getPromoters();
				this.getLocations();
			}
		}
	}
</script>