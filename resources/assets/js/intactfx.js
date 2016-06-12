/**
 * Load the components
 */
require('./core/components');
require('./core/directives');

/**
 * Export the intactfx-app
 */
module.exports = {

    el: '#intactfx-app',

    data: {
    	intactdata:{
    		wallet:{
				amount: 12000,
			},
			mt4account:{
				mini: 100,
				standard: 500,
				iprofit: 500,
				iprofitHigh: 1000,
				broker: 50000,
			},	
			profile:{
				eoffice_id: '',
				email: '',
				password: '',
				new_password: '',
				investor_password: '',
			},
			mt4AccountList:{				
				mini: ''
			},
			setSelected:{
				mt4Account_id: '',
				transferIn: 0,
				transferOut: 0,
			}
		},
		
		tweet_feeds:[]
	},

	created(){

	},

	events:{

	},

	ready: function(){
		// this.fetchTwitterFeeds();
		// var j = this;
		// setInterval(function(){
		// 	j.fetchTwitterFeeds();
		// }, 300000);

		this.$http.get('account/data').then(function(result){

			this.intactdata.profile.eoffice_id = result.data[0]["id"]
			this.intactdata.profile.email = result.data[0]["email"]
			
			this.updateAccounts() //update all accounts
			

		});

		
	},

	methods:{

		submitMini(){
			//create account
			this.$http.post('/mt4/create', this.intactdata).then(
			
			function(data, status, request){
				
				$('#miniAccountModal').modal('hide')
		
				this.getAccount()

			},
			
			function(data, status, request){
				
			});

			// this.$http.post('/api/v1/documents/'+ this.currentDocument.id, this.currentDocument, function(data, status, request) {
			// 	// console.log(this.currentDocument.config.content)
			// 	toastr.options = { "positionClass": "toast-bottom-right" }; toastr.info(data.message)
			// })
		},

		getAccount(){
			// get all account
			this.$http.get('account/getaccount?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){

				this.intactdata.mt4AccountList.mini = result.data

			});
				
		},

		updateAccounts(){
			//update mini account in intactfx db
			this.$http.get('account/updateaccounts?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){

				console.log(result)
				this.getAccount()

			});
		},

		setSelected(id){
			//set selected for transfer in/out
			this.intactdata.setSelected.mt4Account_id = id
		},

		submitTransferIn(){
			//transfer in 
			this.$http.post('/mt4/transferin', this.intactdata.setSelected).then(
			
			function(data, status, request){
				
				console.log(data)

				this.getAccount()
				$('#TransferInModal').modal('hide')

			},
			
			function(data, status, request){
				
			});

		},

		submitTransferOut(){
			//transfer in 
			this.$http.post('/mt4/transferout', this.intactdata.setSelected).then(
			
			function(data, status, request){
				
				console.log(data)
				this.getAccount()
				$('#TransferOutModal').modal('hide')

			},
			
			function(data, status, request){
				
			});

		},

		submitChangePass(){
			alert('change pass')
		},

		processWire(){

			$('#wirebutton').prop('disabled', true);
			
			if (this.intactdata.wallet.amount<=0) {
				alert('please enter amount')
				return false
			};
			
			this.$http.post('/wire', this.intactdata, function(data, status, request) {
				$('#wirebutton').prop('disabled', false);
				alert('invoice sent. please check your email')
				$('#myModal').modal('hide')
			})

			return false;
		},

		fetchTwitterFeeds: function(){
			
			// this.$http.post(window.location.href+'fetchtwitterfeeds', {
			// 	_token:document.querySelector("meta[name='csrf-token']").getAttribute('content')
			// }, function(tweetfeeds){
			// 	// this.$set('tweet_feeds', tweetfeeds);
			// 	this.tweet_feeds = tweetfeeds;
			// 	console.log(tweetfeeds);
			// });

			// $("#twitter .tweets:last-child").addClass('last');
		},

	},

	computed:{

		countPass: function () {
			return this.intactdata.profile.password.length;			 
	    },

	    countPassInvestor: function () {
			return this.intactdata.profile.new_password.length;			 
	    },


      
	}

};

Vue.filter('currencyDisplay', {
  // model -> view
  // formats the value when updating the input element.
  read: function(val) {
    return '$'+val.toFixed(2)
  },
  // view -> model
  // formats the value when writing to the data.
  write: function(val, oldVal) {
    var number = +val.replace(/[^\d.]/g, '')
    return isNaN(number) ? 0 : parseFloat(number.toFixed(2))
  }
})
