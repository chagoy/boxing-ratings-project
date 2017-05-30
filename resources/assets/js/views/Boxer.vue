<template>
	<div>
		<h1>{{ boxer.name }}</h1>
		
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
				//fights: {}
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
				//this.fights = data.boxer.fights;
			}
		}
	}
</script>