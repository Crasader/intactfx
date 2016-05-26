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

		this.transblack();

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
		},
		mainwallet: function()
		{
			$('<div class="transblack"></div>').css({
				backgroundColor:'rgba(0,0,0,0.5)',
				position:'fixed',
				zIndex: '9999',
				width: '100%',
				height: '100%'
			}).prependTo('body');
			$("#mainWallet").show();
		},
		commisionwallet_red: function(){
			$("#commisionwallet_red").modal('show');
		},
		commisionwallet_green: function(){
			$("#commisionwallet_green").modal('show');
		},
		transblack: function(){
			$(document).on('click', '.transblack', function(){
				$(this).remove();
				$('#mainWallet').hide();
			});
		}

	}

};


jQuery(function($){
	$('.input-daterange').datepicker();
});