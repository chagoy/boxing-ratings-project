<template>
	<div>
		<section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        New Promoter
                    </h1>
                    <h2 class="subtitle">Add Below</h2>
                </div>
            </div>
        </section>
       
        <section>
            <div class="field">
                <label class="label">Promoter Name</label>
                    <p class="control">
                        <input type="text" name="name" class="input" v-model="name">
                    </p>
            </div>
            <div class="field">
                <p class="control">
                <button class="button is-primary" @click.prevent="addPromoter">Submit</button>
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
            addPromoter() {
                axios.post('/api/promoters', { name: this.name })
                    .then(({data}) => {
                        this.name = '';
                    });
            }
        }
	}

</script>