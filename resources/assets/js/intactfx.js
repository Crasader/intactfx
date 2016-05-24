/**
 * Load the components
 */
require('./core/components');
require('./core/directives');

/**
 * Export the lawcanvas-app
 */
module.exports = {

    el: '#intactfx-app',

    data: {
    	wallet:{
			amount: 0,	
		},
		tweet_feeds:[]
	},

	created(){
	},

	events:{

	},

	ready: function(){
		this.fetchTwitterFeeds();
	},

	methods:{
		openModal(){
			$('#myModal').modal('show')
		},
		processWire(){
			$('#wirebutton').prop('disabled', true);
			// alert('asdf')
			this.$http.post('/wire', this.wallet, function(data, status, request) {
				$('#wirebutton').prop('disabled', false);
				alert('invoice sent. please check your email')
				$('#myModal').modal('hide')
			})

			return false;
		},
		fetchTwitterFeeds: function(){
			
			this.$http.post(window.location.href+'fetchtwitterfeeds', {
				_token:document.querySelector("meta[name='csrf-token']").getAttribute('content')
			}, function(tweetfeeds){
				// this.$set('tweet_feeds', tweetfeeds);
				this.tweet_feeds = tweetfeeds;
				console.log(this.tweet_feeds);
			});
		}
	}

} 

