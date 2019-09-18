<template>
	<div id="app">
		<button @click="likeUser" class="btn btn-primary">
			<i v-bind:class="thumb" class="fa-thumbs-up"></i> {{ likeState }}
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
			likeState: function () {
				return this.info == 0 ? 'Like' : 'Unlike'
			},
			thumb: function () {
				return this.info == 0 ? 'far' : 'fas'
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
