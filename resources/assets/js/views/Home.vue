<template>
	<div>
		<div class="container">
			<div class="columns">
				<div class="column is-three-quarters">
					<h1 class="title">A Database for Boxing Viewer Data</h1>
					<h3 class="subtitle">This site is a resource for finding all viewer information for boxing on TV. You can search or use the tabs above to see what data is available. As of now there is no pay-per-view data (still working it out). You can read more about our plans in the About section.</h3>		
				</div>
				<div class="column is-one-quarter">
					<boxer-search></boxer-search>
				</div>
			</div>
		</div>
	</div>
	
</template>

<script>
	import BoxerSearch from '../components/BoxerSearch.vue';
	export default {
		components: { BoxerSearch }
	}

</script>