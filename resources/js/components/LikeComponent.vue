<template>
	<div id="app">
		<button @click="likeUser">
			{{ likeState }}
		</button>
	</div>
</template>
<script>
    export default {
    	props: ['profileId'],

    	beforeMount: function() {
		    axios
		        .post('/myspace/public/isLiked/'+this.profileId)
		        .then(response =>  {
		        	this.info = response.data
		        })
		},

		computed: {
			// a computed getter
			likeState: function () {
				// `this` points to the vm instance
				return this.info == 0 ? 'Like' : 'Unlike'
			}
		},

		data() {
		    return {
				info: {},
			};
		},

		methods: {
			likeUser() {
				if (this.info == 0) {
					axios
			        	.post('/myspace/public/likeUser/'+this.profileId)
			        	.then(response => {
			        		this.info = 1
			        	})
			        } else {
			        	axios
				        	.post('/myspace/public/unlikeUser/'+this.profileId)
				        	.then(response => {
				        		this.info = 0
				        	})
			        }
			}
		}
    }
</script>
