<template>
	<div>
		<section class="hero">
			<div class="hero-body">
				<div class="container">
					<h1 class="title">
						{{ network.name }}
					</h1>
					<h2 class="subtitle">
						Damn
					</h2>
				</div>
			</div>
		</section>
		
		<table class="table">
			<thead>
				<tr>
					<th>Date</th>
					<th>Venue</th>
					<th>Headline</th>
					<th>Viewers</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="card in cards">
					<td>
						{{ card.date }}
					</td>
					<td>
						venue
					</td>
					<td>
						{{ card.fights[0].boxers[0].name }} vs {{ card.fights[0].boxers[1].name }}
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
				cards: ''
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
			}
		}

	}
</script>