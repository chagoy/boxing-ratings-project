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

		<article class="message" v-for="fight in fights" :key="fight.id" >
			<div class="message-header">
				<router-link :to="{ name: 'card', params: { network: fight.card.network.name, date: fight.card.date }}">{{ fight.card.network.name }}</router-link>
			</div>
			<div class="message-body">
				 On {{ fight.card.date }} {{ boxer.name }} pulled in {{fight.card.viewers }} viewers
			</div>
			
		</article>
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
				fights: []
			}
		},

		created() {
			this.fetch(this.slug)
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
			}
		}
	}
</script>