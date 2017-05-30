<template>
	<div>
	    <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Submit A Card
                    </h1>
                    <h2 class="subtitle">If you don't see an option, please scroll down and add it in.</h2>
                </div>
            </div>
	    </section>

	    <div class="field is-horizontal">
			<div class="field-label is-normal">
				<label for="date" class="label">Date and Time</label>
			</div>
			<div class="field-body">
				<div class="field is-grouped">
					<p class="control is-expanded">
						<input type="text" class="input" placeholder="Date (MM-DD-YYYY)" name="date" v-model="date">
					</p>
				</div>
				<div class="field">
					<p class="control is-expanded">
						<input type="text" class="input" placeholder="Time (HH:MM:SS)" name="time" v-model="time">
					</p>
				</div>
			</div>
		</div>

		<div class="field">
			<label for="network" class="label">Network</label>
				<p class="control">
					<span class="select">
						<select name="network" id="network" v-model="network_id">
							<option v-for="network in networks" v-bind:value="network.id">{{ network.name }}</option>
						</select>
					</span>
				</p>
		</div>

		<div class="field">
			<label for="promoter" class="label">Promoter</label>
				<p class="control">
					<span class="select">
						<select name="promoter" id="promoter" v-model="promoter_id">
							<option v-for="promoter in promoters" v-bind:value="promoter.id">{{ promoter.name }}</option>
						</select>
					</span>
				</p>
		</div>

		<div class="field">
			<label for="location_id" class="label">Venue</label>
			<p class="control">
				<span class="select">
					<select name="location_id" id="location_id" v-model="location_id">
						<option v-for="location in locations" v-bind:value="location.id">{{ location.venue }}</option>
					</select>
				</span>
			</p>
		</div>

		<div class="field">
			<label for="viewers" class="label">Viewers</label>
				<p class="control">
					<input type="text" class="input" v-model="viewers">
				</p>
		</div>
		<div class="field is-horizontal">
			<div class="field-label is-normal">
				<label for="headline_a" class="label">Main Event</label>
			</div>
			<div class="field-body">
				<div class="field is-grouped">
					<p class="control is-expanded">
						<span class="select">
							<select name="headline_a" id="headline_a" v-model="selected_headline_a">
								<option v-for="boxer in boxers" v-bind:value="boxer.id">{{ boxer.name }}</option>
							</select>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control is-expanded">
						<span class="select">
							<select name="headline_b" id="headline_b" v-model="selected_headline_b">
								<option v-for="boxer in boxers" v-bind:value="boxer.id">{{ boxer.name }}</option>
							</select>
						</span>
					</p>
				</div>
			</div>
			<div class="field">
					<label for="Type" class="label">Type</label>
						<p class="control">
							<span class="select">
								<select name="type" id="type" v-model="type">
									<option value="headline">Headline</option>
									<option value="opener">Opener</option>
								</select>
							</span>
						</p>
				</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label"></div>
			<div class="field-body">
				<div class="field">
					<div class="control">
						<button class="button is-primary" @click.prevent="addRatings">
							Submit
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
</template>

<script>
    export default {
        props: ['boxers', 'promoters', 'networks', 'locations'],

        data() {
        	return {
        		date: '',
        		time: '',
        		network_id: '',
        		promoter_id: '',
        		location_id: '',
        		viewers: '',
        		selected_headline_a: '',
        		selected_headline_b: '',
        		type: ''
        	}
        },

        methods: {
        	addRatings() {
        		axios.post('/api/card', {
        			time: this.time,
					date: this.date,
					network_id: this.network_id,
					promoter_id: this.promoter_id,
					location_id: this.location_id,
					viewers: this.viewers,
					selected_headline_a: this.selected_headline_a,
					selected_headline_b: this.selected_headline_b,
					type: this.type
        		})
        			.then(({data}) => {
        				this.network_id = '',
        				this.promoter_id = '',
        				this.location_id = '',
        				this.viewers = '',
        				this.selected_headline_a = '',
        				this.selected_headline_b = '',
        				this.date = '',
        				this.time = '',
        				this.type = ''
        			});
        	}
        }


    }
</script>
