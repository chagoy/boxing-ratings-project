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