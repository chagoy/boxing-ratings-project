<template>
	<div>
		
		<table class="table is-stripe is-narrow">
			<thead>
				<tr>
					<th><abbr title="Venue">Venue</abbr></th>
					<th><abbr title="City">City</abbr></th>
					<th><abbr title="State">State</abbr></th>
					<th><abbr title="Country">Country</abbr></th>
				</tr>
			</thead>
			<tbody v-for="location in locations">
				<td>
					<router-link :to="{ name: 'venue', params: { venue: location.slug }}">
					{{ location.venue }}
					</router-link>
				</td>
				<td>
					{{ location.city }}
				</td>
				<td>
					{{ location.state }}
				</td>
				<td>
					{{ location.country }}
				</td>
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
				venues: [],
				cities: [],
				states: [],
				countries: [],
				cards: [],
				locations: '',
				loaded: false
			}
		},

		created() {
			this.fetch();
		},

		watch: {
			locations: function() {
				this.grab();
				this.loaded = true;
			}
		},

		methods: {
			fetch() {
				this.getLocations();
				},

			grab() {
				for (var i = 0; i < this.locations.length; i++) {
					this.venues.push(this.locations[i].venue);
					this.cities.push(this.locations[i].cities);
					this.states.push(this.locations[i].states);
					this.countries.push(this.locations[i].countries);
					this.cards.push(this.locations[i].cards);
				}
			}
		}

	}
</script>