<template>
	<div>
		<section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        New Location
                    </h1>
                    <h2 class="subtitle">Add Below</h2>
                </div>
            </div>
        </section>
       
        <section>
            <div class="field">
                <label class="label">Venue</label>
                    <p class="control">
                        <input type="text" name="venue" class="input" v-model="venue">
                    </p>
            </div>
            <div class="field">
                <label class="label">City</label>
                    <p class="control">
                        <input type="text" name="city" class="input" v-model="city">
                    </p>
            </div>
            <div class="field">
                <label class="label">State</label>
                    <p class="control">
                        <input type="text" name="state" class="input" v-model="state">
                    </p>
            </div>
            <div class="field">
                <label class="label">Country</label>
                    <p class="control">
                        <input type="text" name="country" class="input" v-model="country">
                    </p>
            </div>
            <div class="field">
                <p class="control">
                <button class="button is-primary" @click.prevent="addLocation">Submit</button>
                </p>
            </div> 
        </section>	
	</div>
	
</template>
<script>
    export default {
        data() {
            return {
                venue: '',
                city: '',
                state: '',
                country: ''
            }
        }, 
        methods: {
            addLocation() {
                axios.post('/api/locations', { venue: this.venue, city: this.city, state: this.state, country: this.country })
                    .then(({data}) => {
                        this.venue = '';
                        this.city = '';
                        this.state = '';
                        this.country = '';
                    });
            }
        }
    }
</script>