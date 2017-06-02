<template>
	<div>
	
		<h1 class="title">
			{{ locations.venue }}
		</h1>
		<h2 class="subtitle">
			{{ locations.city }}, {{ locations.state }}, {{ locations.country }}
		</h2>
		
		<table class="table">
			<thead>
				<tr>
					<th>Date</th>
					<th>Network</th>
					<th>Viewers</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="card in cards">
					<td>
						<router-link :to="{ name: 'card', params: {network: card.network.slug, date: card.date }}">{{ card.date }}</router-link>
					</td>
					<td>
						{{ card.network.name }}
					</td>
					<td>
						{{ numberWithCommas(card.viewers) }}
					</td>
				</tr>
			</tbody>
		</table>

	</div>
</template>

<script>
	import collection from '../mixins/collection'

	export default {

		mixins: [collection],

		data() {
			return {
				cards: '',
				locations: ''
			}
		},

		created() {
			this.fetch();
		},

		methods: {
			fetch() {
				axios.get('/api/venue/' + this.$route.params.venue)
					.then(this.fill);
			},
			fill({data}) {
				this.locations = data.location[0];
				this.cards = data.location[0].cards;
			}
		}
	}
</script>