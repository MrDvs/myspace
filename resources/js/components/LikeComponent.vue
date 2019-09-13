<template>
	<div id="app">
		<button @click="likeUser">
			{{likeState}}
		</button>
		{{info}}
	</div>
</template>
<script>
    export default {

    	beforeMount: function() {
		    axios
		        .post('isLiked/2')
		        .then(response =>  {
		        	this.info = response.data
		        })
		  },
		  computed: {
		    // a computed getter
		    likeState: function () {
		      // `this` points to the vm instance
		      return this.info == 1 ? 'liked' : 'Unlike'
		    }
		  },
		data() {
		    return {
				count: 0,
				info: {},
			};
		},

		methods: {
			likeUser() {
				axios
		        	.post('likeUser/2')
		        	.then(response => (this.info = response))
			}
		}
    }
</script>
