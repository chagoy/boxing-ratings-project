<template>
	<div>
			<div class="tabs is-centered">

				<ul v-for="promoter in promoters">
					<li><a v-bind:href="promoter.slug" @click.prevent="promoterInfo(promoter.slug)">{{ promoter.name }}</a></li>
				</ul>

			</div>
		
			<div v-show="promoter_data">
				<section class="hero">
					<div class="hero-body">
						<div class="container">
							<h1 class="title">
								{{ promoter_data.name }}
							</h1>
							<h2 class="subtitle">
								{{ promoter_data.name }}
							</h2>
						</div>
					</div>
				</section>

			<div class="container">
				<h1>List of boxers currently signed with {{ promoter_data.name }}</h1>

					<table class="table">
						<thead>
							<tr>
								<th><abbr title="Name">Name</abbr></th>
							</tr>
						</thead>
						<tbody v-for="boxer in boxers">
							<td>
								<!-- <a v-bind:href="boxer.name" @click.prevent="boxerInfo(boxer.name)">
									{{ boxer.name }}
								</a> -->
								<router-link :to="{ name: 'boxer', params: { boxer: boxer.slug }}">{{ boxer.name }}</router-link>
							</td>
						</tbody>
					</table>
				<h1>List of cards promoted by {{ promoter_data.name }}</h1>
					<table class="table">
						<thead>
							<tr>
								<th><abbr title="Network">Network</abbr></th>
								<th><abbr title="Date">Date</abbr></th>
								<th><abbr title="Date">Viewers</abbr></th>
							</tr>
						</thead>
						<tbody v-for="card in cards">
							<td>
								<router-link :to="{ name: 'card', params: { network: card.network.name, date: card.date }}">{{ card.network.name }}</router-link>
							</td>
							<td>
								<router-link :to="{ name: 'card', params: {network: card.network.name, date: card.date }}">{{ card.date }}</router-link>
							</td>
							<td>
								{{ card.viewers }}
							</td>
						</tbody>
					</table>
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
				promoters: '',
				promoter_data: false,
				boxers: '',
				ratings: '',
				cards: '',
				boxer_page: true
			}
		},

		created() {
			this.fetch();
		},

		methods: {
			fetch() {
				this.getPromoters();
			},

			promoterInfo(promoter) {
				axios.get('/api/promoters/'+ promoter)
					.then(this.promoter);
			},

			promoter({data}) {
				this.promoter_data = data.promoter;
				this.boxers = data.promoter.boxers;
				this.cards = data.promoter.cards;
			},

			boxerInfo(boxer) {
				axios.get('/api/boxers/' + boxer)
					.then(this.boxer);
			},

			boxer({data}) {
				this.boxer_data = data;
				this.boxer_page = false;
			}
		}
	}
</script>