<template>
	<p>Authenticating</p>
</template>

<script type="text/javascript">
	export default {
		mounted: function() {
			const jwt = this.getMetaContentByName('jwt');
			AuthService.receiveToken(jwt);
		},

		methods: {
			getMetaContentByName: function(name,content) {
			   var content = (content==null)?'content':content;
			   return document.querySelector("meta[name='"+name+"']").getAttribute(content);
			}
		}
	}
</script>