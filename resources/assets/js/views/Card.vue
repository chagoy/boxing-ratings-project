<template>
	<div>
		
		<section class="hero">
			<div class="hero-body">
				<div class="container">
					<h1 class="title">
						{{ network.name }}
					</h1>
					<h2 class="subtitle">
						{{ card.date }}
					</h2>
				</div>
			</div>
		</section>

		<div class="container">
			<div class="notification">
				<p class="title is-3">Location</p>
				<p class="subtitle is-5">{{ location.venue }}, {{ location.city }}, {{ location.state }}, {{ location.country }}</p>
				<hr>
				<p class="title is-3">Main Event</p>
				<p class="subtitle is-5">
					<router-link :to="{ name: 'boxer', params: { boxer: boxers[0].slug }}">{{ boxers[0].name }}</router-link>
					vs 
					<router-link :to="{ name: 'boxer', params: { boxer: boxers[1].slug }}">{{ boxers[1].name }}</router-link>
				</p>
				<hr>
				<p class="title is-3">Promoter</p>
				<p class="subtitle is-5">{{ promoter.name }}</p>
				<hr>
				<p class="title is-3">Viewers</p>
				<p class="subtitle is-5">{{ numberWithCommas(card.viewers) }}</p>
			</div>
		</div>

	</div>
</template>

<script>
	import collection from '../mixins/collection';

	export default {

		mixins: [collection],

		data() {
			return {
				url_date: this.$route.params.date,
				url_network: this.$route.params.network,
				boxers: '',
				location: '',
				promoter: '',
				network: '',
				fight: '',
				card: '',
				viewers: ''
			}
		},
		created() {
			this.fetch(this.url_network, this.url_date);
		},

		methods: {
			fetch(network, date) {
				axios.get('/api/cards/' + network + '/' + date)
					.then(this.assign);
			},
			assign({data}) {
				this.fight = data.fight; 
				this.network = data.network;
				this.location = data.location;
				this.card = data.card;
				this.promoter = data.promoter;
				this.boxers = data.fight[0].boxers;
				this.viewers = this.numberWithCommas(this.card.viewers);
			}
		}
	}
</script>