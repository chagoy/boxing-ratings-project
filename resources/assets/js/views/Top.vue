<template>
	<table class="table is-striped is-narrow">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Date</th>
					<th>Network</th>
					<th>Headline</th>
					<th>Viewers</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(card, index) in cards">
					<td>
						{{ index + 1 }}
					</td>
					<td>
						<router-link :to="{ name: 'card', params: {network:card.network.name, date: card.date }}">{{ card.date }}</router-link>
					</td>
					<td>
						<router-link :to="{ name: 'network', params: { network:card.network.name, date: card.date }}">{{ card.network.name }}</router-link>
					</td>
					<td>
						<router-link :to="{ name: 'boxer', params: { boxer: card.fights[0].boxers[0].slug }}">{{ card.fights[0].boxers[0].name }}</router-link>
						vs 
						<router-link :to="{ name: 'boxer', params: { boxer: card.fights[0].boxers[1].slug }}">{{ card.fights[0].boxers[1].name }}</router-link>
					</td>
					<td> 
						{{ numberWithCommas(card.viewers) }}
					</td>
				</tr>
			</tbody>
		</table>
</template>

<script>
	
	import collection from '../mixins/collection';

	export default {

		mixins: [collection],

		data() {
			return {
				cards: ''
			}
		},

		created() {
			this.fetch();
		},

		methods: {
			fetch() {
				axios.get('/api/card')
					.then(this.fill)
			},

			fill({data}) {
				this.cards = data;
			}
		}
	}
</script>