Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name='csrf-token']").getAttribute('content');

var vm = new Vue({
	el: "#twitter",
	ready: function(){
		
		// var _token = $("meta[name='csrf-token']").attr('content');

		this.fetchTwitterFeeds();
		
	},
	data: {
		tweet_feeds:[]
	},
	methods : {
		fetchTwitterFeeds: function(){
			this.$http.post(window.location.href+'fetchtwitterfeeds', {
				_token:document.querySelector("meta[name='csrf-token']").getAttribute('content')
			},{emulateJSON:true}).then(function(tweetfeeds){
				console.log(tweetfeeds);
				this.$set('tweet_feeds', JSON.stringify(tweetfeeds));
			});
			
			// $.ajax({
			// 	type:"POST",
			// 	url:window.location.href+'fetchtwitterfeeds',
			// 	data:{
			// 		_token:document.querySelector("meta[name='csrf-token']").getAttribute('content')
			// 	},
			// 	dataType:"JSON",
			// 	success: function(s){
					 
			// 		console.log(s);
			// 		vm.$set('tweet_feeds', s);
			// 	}
			// });
		}
	}
});