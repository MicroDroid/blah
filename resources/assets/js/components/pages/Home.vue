<template>
	<div class="container">
		<ul class="list-group">
			<li class="list-group-item" v-for="tasklist in tasklists">{{name}}</li>
		</ul>
	</div>
</template>

<script type="text/javascript">
	export default {
		data: () => ({
			tasklists: [],
		}),

		mounted: function() {
			axios.get('/api/tasklists')
				.then(response => {
					this.tasklists = response.data;
				});
		}
	}
</script>