<template>
	<div>
		<section class="hero">
			<div class="hero-body">
				<div class="container">
					<h1 class="title">
						{{ boxer.name }}
					</h1>
					<h2 class="subtitle">
						{{ promoter.name}}
					</h2>
				</div>
			</div>
		</section>

		<section v-cloak>
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
						<p class="title">{{ fights.length }}</p>
					</div>
				</div>
			</nav>
		</section>

		<table class="table">
			<thead>
				<tr>
					<th>Date</th>
					<th>Network</th>
					<th>Headline</th>
					<th>Viewers</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="fight in fights">
					<td>
						<router-link :to="{ name: 'card', params: {network: fight.card.network.slug, date: fight.card.date }}">{{ fight.card.date }}</router-link>
					</td>
					<td>
						<router-link :to="{ name: 'network', params: { network: fight.card.network.slug }}">
							{{ fight.card.network.name }}
						</router-link>
					</td>
					<td>
						<router-link :to="{ name: 'boxer', params: { boxer: fight.boxers[0].slug }}">{{ fight.boxers[0].name }}</router-link>
						vs
						<router-link :to="{ name: 'boxer', params: { boxer: fight.boxers[1].slug }}">{{ fight.boxers[1].name }}</router-link>
					</td>
					<td> 
						{{ numberWithCommas(fight.card.viewers) }}
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
				slug: this.$route.params.boxer,
				boxer: '',
				promoter: '',
				fights: [],
				viewersArray: []
			}
		},

		created() {
			this.fetch(this.slug)
		},

		watch: {
			'$route' (to, from) {
				this.fetch(this.$route.params.boxer);
			}
		},

		methods: {
			fetch(boxer) {
				axios.get('/api/boxers/' + boxer)
					.then(this.loadBoxer);
			},

			loadBoxer({data}) {
				this.boxer = data.boxer;
				for (var i = 0; i < data.boxer.fights.length; i++) {
					this.fights.push(data.boxer.fights[i]);
				}
				this.promoter = data.promoter;

				this.createViewersArray(this.fights)
			},

			createViewersArray(x) { 
				var array = [];
				for (var i = 0; i < x.length; i++) {
					array.push(x[i].card.viewers);
				}
				return this.viewersArray = array;
			}
		}
	}
</script>