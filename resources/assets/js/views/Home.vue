<template>
	<div>
		<div class="container">
			<div class="columns">
				<div class="column is-three-quarters">
					<h1 class="title">A Database for Viewer Data</h1>
					<h3 class="subtitle">This site is a resource for finding all the viewer information for boxing on TV. You can search or use the tabs above to see what data is available.</h3>		
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