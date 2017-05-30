<template>
	<div>
		<section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        New Boxer
                    </h1>
                    <h2 class="subtitle">Add Below</h2>
                </div>
            </div>
        </section>
        <section>
        	
			<div class="field">
				<label for="boxer" class="label">Name</label>
				<p class="control">
					<input type="text" class="input" v-model="name">
				</p>
			</div>
			<div class="field has-addons">
				<p class="control is-expanded">
					<span class="select is-fullwidth">
						<select name="promoter" id="promoter" v-model="promoter_id">
							
							<option v-for="promoter in promoters" v-bind:value="promoter.id">{{ promoter.name }}</option>

						</select>
					</span>
				</p>
				<p class="control">
					<button type="submit" class="button is-primary" @click.prevent="addBoxer">Submit</button>
				</p>
			</div>

        </section>
    </div>
</template>

<script>
	export default {

		props: ['promoters'],

		data() {
			return {
				name: '',
				promoter_id: ''
			}
		},

		methods: {

			addBoxer() {
				axios.post('/api/boxers', { name: this.name, promoter_id: this.promoter_id })
					.then(({data}) => {
						this.name = '';
						this.seleted = '';
						this.$emit('added');
					});
			}
		}
	}
</script>