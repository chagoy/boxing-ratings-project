<template>
    <div>
                <nav class="panel">
                    <p class="panel-heading">Search</p>
                    <div class="panel-block">
                        <p class="control has-icons-left">
                            <input type="text" class="input is-small" placeholder="Search by boxer name..." v-model="query" v-on:keyup="autoComplete">
                            <span class="icon is-small is-left">
                                <i class="fa fa-search"></i>
                            </span>
                        </p>
            </div>
            <div v-if="results.length" v-for="result in results">
                <router-link class="panel-block" tag="a" :to="{ name: 'boxer', params: { boxer: result.slug }}">
                    <span class="panel-icon">
                        <i class="fa fa-user"></i>
                    </span>
                    {{ result.name }}
                </router-link>
            </div>
        </nav>
    </div>


</template>

<script>

    export default {
        data() {
            return {
                query: '',
                results: []
            }
        },

        methods: {
            autoComplete() {
                this.results = [];
                if (this.query.length > 2) {
                    axios.get('/boxers', {
                        params: {query: this.query }
                    }).then(response => {
                        this.results = response.data
;                    });
                }
            }
        }
    }

</script>