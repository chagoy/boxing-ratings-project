<template>
	<div>
		<section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        New Network
                    </h1>
                    <h2 class="subtitle">Add Below</h2>
                </div>
            </div>
        </section>
       
        <section>
            <div class="field">
                <label class="label">Network Name</label>
                    <p class="control">
                        <input type="text" name="name" class="input" v-model="name">
                    </p>
            </div>
            <div class="field">
                <p class="control">
                <button class="button is-primary" @click.prevent="addNetwork">Submit</button>
                </p>
            </div> 
        </section>	
	</div>
	
</template>

<script>
	export default {
		data() {
            return {
                name: ''
            }
        },

        methods: {
            addNetwork() {
                axios.post('/api/networks', { name: this.name })
                    .then(({data}) => {
                        this.name = '';
                    });
            }
        }
	}
</script>