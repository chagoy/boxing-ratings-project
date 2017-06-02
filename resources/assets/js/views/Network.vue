<template>
	<div>
		<section class="hero">
			<div class="hero-body">
				<div class="container">
					<h1 class="title">
						{{ network.name }}
					</h1>
					<h2 class="subtitle">
						
					</h2>
				</div>
			</div>
		</section>
		<ul v-for="card in network.cards">
			<li>
				{{ card.fights.boxers }}
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
				network: ''
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
			}
		}

	}
</script>