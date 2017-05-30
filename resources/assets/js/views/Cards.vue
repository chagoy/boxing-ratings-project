<template>
	
</template>

<script>
	export default {
		data() {
			return {
				cards: '', 
				fights: ''
			}
		},

		created() {
			this.getCardsData();
		},

		methods: {
			getCardsData() {
				axios.get('/api/card')
					.then(this.refreshCards);
			},
			refreshCards({data}) {
				this.cards = data;
				this.fights = data.fights;
			}
		}
	}
</script>