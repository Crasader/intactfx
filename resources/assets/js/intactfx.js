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
				deposit: 0,
				withdrawal: 0,
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
				sel_password:'',
				sel_inpassword:'',
				radio_mini_mt4Account_id: '',
				radio_standard_mt4Account_id: '',
				radio_mt4Account_id: '',
				radio_mt4Account_id: '',
				radio_mt4Account_id: '',
			},
			setSelected:{
				mt4Account_id: '',
				transferIn: 0,
				transferOut: 0,
				accountType: '',
				passwordType: '',
			}
		},

		mt4AccountList:{
				accounts: ''
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

		empty(){
			$('#inputDeposit').val('')
			
		},
		
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

				this.mt4AccountList.accounts = result.data

			});
				
		},

		updateAccounts(){
			//update mini account in intactfx db
			this.$http.get('account/updateaccounts?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){

				console.log(result) 
				this.getAccount() // get all account

			});
		},

		setSelected(id){
			//set selected for transfer in/out
			this.intactdata.setSelected.mt4Account_id = id
		},

		accountSetSelected(accountType){
			// alert(accountType)
			this.intactdata.setSelected.accountType = accountType
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
			// alert('change pass')
			// minimum char 7
			if (this.intactdata.profile.password.length < 7 || this.intactdata.profile.new_password.length < 7) {
				alert('Password Minimum Character: 7')
				return false;
			};

			// regex - one capital letter && one number && one small letter
			var regEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
			
			if (!regEx.test(this.intactdata.profile.new_password)) {
				alert('Password should contain atlest:\none capital letter \none number \none small letter')
				return false
			};
			
			//check if the mtr account with the oldpassword is existing
			this.$http.get('account/checkpassword?password=' + this.intactdata.profile.password + '&mt4login_id=' + this.intactdata.setSelected.mt4Account_id + '&passwordType=' + this.intactdata.setSelected.passwordType).then(function(result){
				
				// if (result.data[0]['mt4login_id']==this.intactdata.setSelected.mt4Account_id) {
				if (result.data.length != 0) {
					//request change pass
					// get the current password
					this.intactdata.profile.sel_password = result.data[0]['password'];
					this.intactdata.profile.sel_inpassword = result.data[0]['password_investor'];

					this.$http.post('mt4/changepassword', this.intactdata).then(
					function(data, status, request){
						
					}, 
					function(data, status, request){
							
					});

					console.log(result.data)

				} else {
					alert('Wrong Password')
					return false;
				}
			});

		},

		openModal(accountType, passwordType){
			//set selected account type
			this.intactdata.setSelected.accountType = accountType
			this.intactdata.setSelected.passwordType = passwordType
			//check if user select an account for changing password
			switch(this.intactdata.setSelected.accountType) {
			    case 'mini':
			        this.intactdata.setSelected.mt4Account_id = this.intactdata.profile.radio_mini_mt4Account_id
			        break;
			    case 'standard':
			        this.intactdata.setSelected.mt4Account_id = this.intactdata.profile.radio_standard_mt4Account_id
			        break;
			}

			if (this.intactdata.setSelected.mt4Account_id=='') {
				alert('Please Select Account')
				return false;
			};

			$('#changePassModal').modal('show')

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
