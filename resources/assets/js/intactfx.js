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
	},

	created(){
	},

	events:{

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
		}
	}

} 

