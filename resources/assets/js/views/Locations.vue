<template>
	<button @click.prevent="grab">venues</button>
</template>

<script>
	import collection from '../mixins/collection';

	export default {

		mixins: [collection],

		data() {
			return {
				venues: [],
				city: [],
				state: '',
				country: '',
				locations: ''
			}
		},

		created() {
			this.fetch();
		},

		methods: {
			fetch() {
				this.getLocations();
				},

			grab() {
				for (var i = 0; i < this.locations.length; i++) {
					this.venues.push(this.locations[i].venue);
					//this.city.push(this.locations[i].city);
				}
			}
		}

	}
</script>