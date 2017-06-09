<template>
	<div>

				<ul v-for="promoter in promoters">
					<li>
						<router-link tag="a" :to="{ name: 'promoter', params: { promoter: promoter.slug }}">{{ promoter.name }}</router-link>
					</li>
				</ul>
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