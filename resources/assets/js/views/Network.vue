<template>
	<div>
		<section class="hero">
			<div class="hero-body">
				<div class="container">
					<h1 class="title">
						{{ network.name }}
					</h1>
				</div>
			</div>
		</section>
		<section>
			<nav class="level">
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">High</p>
						<p class="title">{{ highestCard(viewersArray) }}</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">Low</p>
						<p class="title">{{ lowestCard(viewersArray) }}</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">Average</p>
						<p class="title">{{ averageViewers(viewersArray) }}</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading"># of Cards in db</p>
						<p class="title">{{ cards.length }}</p>
					</div>
				</div>
			</nav>
		</section>
		
		<table class="table is-striped is-narrow">
			<thead>
				<tr>
					<th>Date</th>
					<th>Headline</th>
					<th>Viewers</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="card in cards">
					<td>
						<router-link :to="{ name: 'card', params: {network:network.name, date: card.date }}">{{ card.date }}</router-link>
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

	</div>
</template>

<script>
	import collection from '../mixins/collection';

	export default {

		mixins: [collection],

		data() {
			return {
				network: '',
				cards: '',
				viewersArray: []
			}
		},

		created() {
			this.fetch();
		},

		methods: {
			fetch() {
				axios.get('/api/networks/' + this.$route.params.network)
					.then(this.fill)
			},

			fill({data}) {
				this.network = data.network[0];
				this.cards = data.network[0].cards;
				this.createViewersArray(this.cards);
			},

			createViewersArray(cards) {
				var array = [];
				for (var i = 0; i < cards.length; i++) {
					array.push(cards[i].viewers);
				}
				this.viewersArray = array;
			}
		}

	}
</script>