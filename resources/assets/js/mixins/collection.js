export default {

	data() {
		return {
			boxers: '',
			promoters: '',
			networks: '',
			locations: ''
		}
	},

	methods: {

		getBoxers() {
			axios.get('/api/boxers')
                .then(this.refreshBoxers);
		},

		getNetworks() {
			axios.get('/api/networks')
				.then(this.refreshNetworks);
		},

		getPromoters() {
			axios.get('/api/promoters')
				.then(this.refreshPromoters);
		},

		getLocations() {
			axios.get('/api/locations')
				.then(this.refreshLocations);
		},

		refreshBoxers({data}) {
			this.boxers = data;
		},

		refreshNetworks({data}) {
			this.networks = data;
		},

		refreshPromoters({data}) {
			this.promoters = data;
		},

		refreshLocations({data}) {
			this.locations = data;
		}
	}

}