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
    	firstLoading: true,
    	isFetching:false,
    	otpOkay: false,
    	intactdata:{
    		wallet:{
				amount: 0,
				red: 0,
				green: 0,
				merchant_wallet: 0,
				deposit: 0,
				withdrawal: 0,
				withdrawalLimit: 0,
				withdrawalMerchant: '',
				notes:'',
				merchantCode:'',
				validation_code: '',

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
				hasOpenTrades: 0,
				radio_mini_mt4Account_id: '',
				radio_standard_mt4Account_id: '',
				radio_mt4Account_id: '',
				radio_mt4Account_id: '',
				radio_mt4Account_id: '',
			},
			
			userProfile:{

			},

			setSelected:{
				mt4Account_id: '',
				transferIn: 10,
				transferOut: 10,
				accountType: '',
				passwordType: '',
				mt4Balance: '',
			},
			affiliate:{
				data: '',
				count: ''
			}
		},

		mt4AccountList:{
				accounts: ''
		},

		history:{
			startDate: '',
			endDate: '',
		},

		transactionHistory:{

		},

		redCommissionHistory:{

		},

		redCommissionData:{
			transferToMain: 10,
			transferToMerchant: 10,
		},

		blueCommissionHistory:{

		},

		blueCommissionData:{

		},

		merchantWallet:{
			amount: 0,
			otp: '',
			code: '',
			codeTracking: ''
		},

		profileForm:{
			picked: 'neteller',
			edit: 0,
			status: false,
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
			this.updateWallets() //update all accounts
			this.updateProfile()
			this.updateHistory('all')
			this.updateCommissionHistory()
			this.getAffiliate()

		});
		
	},

	methods:{

		empty(){
			$('#inputDeposit').val('')
		},
		
		submitMini(){
			//create account
			// alert('click') 
			// return false
			if (this.firstLoading==false) {
				this.isLoading()
			};

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
			if (this.firstLoading==false) {
				this.isLoading()
			};
			this.$http.get('account/getaccount?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){
				this.loaded()
				this.mt4AccountList.accounts = result.data

			});
				
		},

		updateHistory(action){	
			if ( this.history.startDate=="" && this.history.startDate==""  && action!='all') {
				alert('please select date')
				return false;
			}else{
				if (this.firstLoading==false) {
					this.isLoading()
				};

				this.$http.get('account/gethistory?action=' + action + '&start=' + this.history.startDate + '&end=' + this.history.endDate).then(function(result){
					this.transactionHistory = result.data;
					this.loaded()
				});	
			}
			return false;
		},

		updateCommissionHistory(){	
			// if ( this.history.startDate=="" && this.history.startDate==""  && action!='all') {
			// 	alert('please select date')
			// 	return false;
			// }else{
				// this.$http.get('account/getcommisionhistory?action=' + action + '&start=' + this.history.startDate + '&end=' + this.history.endDate).then(function(result){
				if (this.firstLoading==false) {
					this.isLoading()
				};
				this.$http.get('account/getredcommisionhistory?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){
					this.redCommissionHistory = result.data;
					this.loaded()
				});	
			// }
			// return false;
		},

		updateAccounts(){
			//update mini account in intactfx db
			this.$http.get('account/updateaccounts?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){

				// console.log(result) 

				if (result.data=='success') {
    				this.firstLoading = false
					this.loaded()
				};
				this.getAccount() // get all account

			});

		},

		updateProfile(){
			if (this.firstLoading==false) {
				this.isLoading()
			};

			this.$http.get('account/getprofile').then(function(result){

				this.intactdata.userProfile = result.data 
				this.loaded()
			});

		},

		updateWallets(){
			if (this.firstLoading==false) {
				this.isLoading()
			};
			this.$http.get('account/updatewallet?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){
				this.intactdata.wallet.amount = result.data['main']
				this.intactdata.wallet.red = result.data['red']
				this.intactdata.wallet.green = result.data['green']
				this.intactdata.wallet.merchant_wallet = result.data['merchant']
				this.loaded()

				// this.intactdata.wallet.amount = 12000
				// this.intactdata.wallet.red = 7000
				// this.intactdata.wallet.green = 5000
				// this.intactdata.wallet.merchant_wallet = 5000
			});

		},

		getAffiliate(){
			if (this.firstLoading==false) {
				this.isLoading()
			};
			this.$http.get('account/getaffiliate').then(function(result){
				this.intactdata.affiliate.data = result.data[0]
				this.intactdata.affiliate.count = result.data[1]
				this.loaded()
			});

		},

		setSelected(id, modal = ''){
				

			//set selected for transfer in/out
			this.intactdata.setSelected.mt4Account_id = id
				if (this.firstLoading==false) {
					this.isLoading()
				};
			
				if (modal=='TransferOutModal') {
					
					this.$http.get('account/updateupdatedaccount?mt4login_id=' + this.intactdata.setSelected.mt4Account_id).then(function(result){		
						
						this.intactdata.setSelected.mt4Balance = result.data.balance

					})
				
					this.$http.get('mt4/hasopentrades?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){
						this.intactdata.profile.hasOpenTrades = result.data
						this.loaded()
						$('#TransferOutModal').modal('show')
					});
					return false
				};

				if (modal=='TransferInModal') {
					this.loaded()
					$('#TransferInModal').modal('show')
				};

			
			
		},

		accountSetSelected(accountType){
			// alert(accountType)
			this.intactdata.setSelected.accountType = accountType
		},

		submitTransferIn(){
			//transfer in 
			if (this.firstLoading==false) {
				this.isLoading()
			};

			this.$http.post('/mt4/transferin', this.intactdata.setSelected).then(
			
			function(data, status, request){
				
				
				console.log(data)	
				
				this.intactdata.wallet.amount  = this.intactdata.wallet.amount - this.intactdata.setSelected.transferIn
				
				this.getAccount()
				this.loaded()
				$('#TransferInModal').modal('hide')

			},
			
			function(data, status, request){
				
			});

		},

		submitTransferOut(){
			//transfer in 
			// alert('asdf')
			if (this.firstLoading==false) {
				this.isLoading()
			};

			this.$http.post('/mt4/transferout', this.intactdata.setSelected).then(
	
			function(data, status, request){
				
				console.log(data)
				this.intactdata.wallet.amount  = parseInt(this.intactdata.wallet.amount) + parseInt(this.intactdata.setSelected.transferOut)
				this.getAccount()
				$('#TransferOutModal').modal('hide')
				this.loaded()
			},
			
			function(data, status, request){
				
			});

		},

		transferToMainWallet(){
			if (this.firstLoading==false) {
				this.isLoading()
			};
			this.$http.post('account/transferfromredtomain', this.redCommissionData).then(
	
			function(data, status, request){
				console.log(data)
				this.updateWallets()
				this.loaded()
			},
			
			function(data, status, request){
				
			});

		},

		transferToMerchantWallet(){
			if (this.firstLoading==false) {
				this.isLoading()
			};

			this.$http.post('account/transferfrommaintomerchant', this.redCommissionData).then(
	
			function(data, status, request){
				console.log(data)
				this.updateWallets()
			},
			
			function(data, status, request){
				
			});

		},


		submitChangePass(){
			// alert('change pass')
			// minimum char 7
			if (this.firstLoading==false) {
				this.isLoading()
			};

			if (this.intactdata.profile.password.length < 7 || this.intactdata.profile.new_password.length < 7) {
				alert('Password Minimum Character: 7')
				this.loaded()
				return false;
			};

			// regex - one capital letter && one number && one small letter
			var regEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
			
			if (!regEx.test(this.intactdata.profile.new_password)) {
				alert('Password should contain atlest:\none capital letter \none number \none small letter')
				this.loaded()
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
						this.loaded()
					}, 
					function(data, status, request){
							
					});

					console.log(result.data)

				} else {
					alert('Wrong Password')
					this.loaded()
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
			if (this.firstLoading==false) {
				this.isLoading()
			};

			$('#wirebutton').prop('disabled', true);
			
			if (this.intactdata.wallet.deposit<=0) {
				alert('Please enter amount')
				this.loaded()
				return false
			};
			
			this.$http.post('/wire', this.intactdata.wallet, function(data, status, request) {
				$('#wirebutton').prop('disabled', false);
				alert('invoice sent. please check your email')
				$('#myModal').modal('hide')
				this.updateWallets()
			})

			return false;
		},

		generateCode(){
			if (this.firstLoading==false) {
				this.isLoading()
			};
			if (this.merchantWallet.otp=='') {
				this.loaded()
				alert('Blank OTP Code')
				return false;
			};

			this.$http.get('account/validateotp?otp_code='+ this.merchantWallet.otp).then(function(result){
				console.log(result.data)

				if (result.data=='') {
					this.loaded()
					alert('OTP Code Not Existing!')

				}else{

					if (result.data.is_deleted==0 || his.otpOkay == true) {

						this.$http.post('account/generatecode', this.merchantWallet).then(
				
						function(data, status, request){
							console.log(data)
							this.merchantWallet.code = data.data
							this.updateWallets()
							this.otpOkay = true;
						},
						
						function(data, status, request){
							
						});

					}else{
						this.loaded()
						alert('OTP Code expired!')

					};
				};


				return false
			});


		},

		codeTracking(){
			if (this.firstLoading==false) {
				this.isLoading()
			};

			if (this.merchantWallet.otp=='') {
				this.loaded()
				alert('Blank OTP Code')
				return false;
			};

			this.$http.get('account/validateotp?otp_code='+ this.merchantWallet.otp).then(function(result){

				if (result.data=='') {
					this.loaded()
					alert('OTP Code Not Existing!')

				}else{

					if (result.data.is_deleted==0 || this.otpOkay == true) {

						this.$http.post('account/generatecode', this.merchantWallet).then(
				
						function(data, status, request){

							this.$http.get('account/codetracking').then(function(result){
								this.merchantWallet.codeTracking = result.data
								this.otpOkay = true;
							});
							this.otpOkay = true;
							this.loaded()
						},
						
						function(data, status, request){
							
						});

						}else{
							this.loaded()
							alert('OTP Code expired!')

						};
				};

			});

			return false;

		},

		merchantWithdrawal(merchant){
			if (this.firstLoading==false) {
				this.isLoading()
			};
			this.intactdata.wallet.withdrawalMerchant = merchant
			// alert(merchant)

			//check if the account has open trades
			this.$http.get('account/checkwithdrawal?merchant=' + this.intactdata.wallet.withdrawalMerchant ).then(function(result){
				console.log(result.data)
				this.intactdata.wallet.withdrawalLimit = result.data
				this.loaded()
			});
	
		},

		depositCode(){
			if (this.firstLoading==false) {
				this.isLoading()
			};

			this.$http.get('account/checkcode?code=' + this.intactdata.wallet.merchantCode).then(function(result){
				console.log(result.data.status)
				this.intactdata.wallet.merchantCode
				if (result.data.status=='empty') {
					this.loaded()
					alert('Merchant Code not Found!')
					return false;
				} else if(result.data.status=='consumed'){
					this.loaded()
					alert('Merchant Code has been used!')
					return false;
				}else{
					this.loaded()
					alert('Merchant Code Found!')

					this.intactdata.wallet.deposit = result.data.amount

					this.$http.get('account/depositcode?code=' + this.intactdata.wallet.merchantCode).then(function(result){
						if (result.data=='success') {
							$('#MainWalletModal').modal('hide')
							this.updateWallets()
						};
					});	

				}
			});

		},

		greenWallet(){

			if (this.intactdata.userProfile.account_stat=='ib_account' || this.intactdata.userProfile.merchant_stat==1 ) {
				$('#Commission2WalletModal').modal('show')	
			}else{
				alert('Apply for merchant account to access this page')
				$('#CommissionWalletModal').modal('show')	
			};
			return false
		},

		hasOpenTrades(){

			this.$http.get('mt4/hasopentrades?eoffice_id=' + this.intactdata.profile.eoffice_id).then(function(result){
				if (result.data==0) {
					return false;	
				}else{
					return true;
				};
	
			});

		},
		
		profileEdit(){
			this.profileForm.status=true
			this.profileForm.edit = 1
		},

		profileUpdate(){
			if (this.firstLoading==false) {
				this.isLoading()
			};

			this.$http.post('account/profileupdate', this.intactdata.userProfile, function(data, status, request) {
				if (data=='success') {
					this.updateProfile()
				};
				this.profileForm.edit = 0
				this.profileForm.status=false
				this.loaded()
			})

		},


		sendConfirmationSms(){
			if (this.firstLoading==false) {
				this.isLoading()
			};

			this.$http.get('account/confirm').then(function(result){
				console.log(result.data)
				if (result.data=="success") {
					this.loaded()
					alert('Validation Code has been sent.')

				} else if(result.data==24) {
					this.loaded()
					alert('Invalid Number. Please enter complete phone number with country code')

				} else{
					this.loaded()
					alert('Error on sending validation code')

				}
				
			});


		},

		confirmPhoneNumber(){
			if (this.firstLoading==false) {
				this.isLoading()
			};

			if (this.intactdata.wallet.validation_code=='') {
				this.loaded()
				alert('validation code cannot be blank');
				return false;
			};

			this.$http.get('account/validate?validation_code='+ this.intactdata.wallet.validation_code).then(function(result){

				if (result.data=='') {
					this.loaded()
					alert('Validation Code Not Existing!')

				}else{

					if (result.data.is_deleted==0) {

						this.updateProfile()
						this.loaded()
						alert('Phone number validated')

					}else{
						this.loaded()
						alert('Validation Code expired!')

					};
				};

			});

		},

		requestOTP(){
			if (this.firstLoading==false) {
				this.isLoading()
			};

			this.$http.get('account/requestotp').then(function(result){

				if (result.data=='success') {
					this.loaded()
					alert('OTP Code has been sent.')

				}else{
					this.loaded()
					alert('Error on sending OTP code')

				}

			});
		},

		isLoading(){
			$('#loading').removeClass('loaded');
		},

		loaded(){
			$('#loading').addClass('loaded');
		},

		moment: function (date) {
	      return moment(date);
	    },


	},

	computed:{

		countPass: function () {
			return this.intactdata.profile.password.length;			 
	    },

	    countPassInvestor: function () {
			return this.intactdata.profile.new_password.length;			 
	    },

     	monitorWithdrawal: function (){
     		return this.intactdata.wallet.withdrawalLimit - this.intactdata.wallet.withdrawal
     	}

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


