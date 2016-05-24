// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name='csrf-token']").getAttribute('content');



var tw = new Vue({
	el: "#intactfx-app",
	data: {
		// tweet_feeds:[],
		// test:'This is a test!'
		
	},
	ready: function(){
		
		// var _token = $("meta[name='csrf-token']").attr('content');

		// this.fetchTwitterFeeds();
		// alert(test);
	},
	
	methods : {
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
});

