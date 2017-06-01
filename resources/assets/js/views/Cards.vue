<template>
	<div>
		<h1 v-for="card in cards">{{ card.location_id }}</h1>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				cards: [], 
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
				for (var i = 0; i < data.length; i++) {
					this.cards.push(data[i]);
				}
			}
		}
	}
</script>