<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,400italic,500italic,500,600,600italic,700,700italic,800,800italic,900,900italic);

/* =Structure
-------------------------------------------------------------- */

body {
  font-family: 'Raleway', sans-serif;
  background-color: #fff;
  margin: 0;
  padding: 0;
  font-size: 16px;
  font-weight: normal;
  color: #000;
}

.row {
	clear: both;
	overflow: hidden;
}

.one-half {
	width: 50%;
	float: left;
}

.one-third {
	width: 28%;
	float: left;
	margin: 0 2% 0 0;
}

.three-fourth {
	width: 70%;
	float: left;
	margin: 0 5% 0 0;
}

.three-fourth.last {
	margin: 0;
}

.one-third.last {
	margin: 0;
}

/* =Typography
-------------------------------------------------------------- */

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: 'Raleway', sans-serif;
  font-weight: normal;
  color: #000;
}

h1 {
	font-size: 34px;
	line-height: 40px;
	margin: 0 0 20px 0;
}


h2 {
	font-size: 26px;
	line-height: 32px;
	margin: 0 0 20px 0;
}

h3 {
	font-size: 22px;
	line-height: 26px;
	margin: 0 0 10px 0;
}

h4 {
	font-size: 20px;
	line-height: 26px;
	margin: 0 0 20px 0;
}

.uppercase {
	text-transform: uppercase;
}

.lowercase {
	text-transform: lowercase;
}

.capitalize {
	text-transform: capitalize;
}

.text-center {
	text-align: center;
}

.text-right {
	text-align: right;
}

.text-left {
	text-align: left;
}

.nopadding {
	padding: 0 !important;
}

.nomargin {
	margin: 0 !important;
}

.bold {
	font-weight: 700 !important;
}

.semibold {
	font-weight: 600 !important;
}

.italic {
	font-style: italic !important;
}

.small {
	line-height: normal !important;
}

.block {
	display: block;
}

.fr {
	float: right;
}

.fl {
	float: left;
}

.gap {
	clear: both;
	overflow: hidden;
	height: 30px;
}

/*link*/
a {
	color: #2a3acf;
	text-decoration: none;
}

a:hover, a:focus, a:active {
	color: #2a3acf;
	text-decoration: underline;
}

/*hr*/

hr {
	border: 3px solid #45ab5a;
	clear: both;
	overflow: hidden;
}

/*color*/

.brown {
	color: #311409 !important;
}

.yellow {
	color: #ff9600 !important;
}

.red {
	color: #f70707 !important;
}

/* =Header
-------------------------------------------------------------- */

#header {
	border-top: 13px solid #45ab5a;
 	background: #1a2428;
 	margin: 10px 0 0; 
 	background: url(../img/email/miniaccountcreated/header-bg.jpg) no-repeat 0 0;
 	height: 337px;
 	background-size: cover;
}

#header .header-title {
	margin: 221px 0 30px 13.5%;
	height: 73px;
	border-top: 3px solid #878683;
	border-left: 3px solid #878683;
	border-bottom: 3px solid #878683;
	-webkit-border-radius: 40px 0 0 40px; 
  	-moz-border-radius: 40px 0 0 40px; 
  	border-radius: 40px 0 0 40px; 
  	clear: both;
  	overflow: hidden;
  	background: #45ab5a;
  	padding: 0 50px;
}

#header .header-title h1 {
	font-size: 34px;
	line-height: 67px;
	color: #000;
	margin: 0;
	font-weight: 600;
}


/* =Section Main
-------------------------------------------------------------- */

#main {
	clear: both;
	overflow: hidden;
	background: #fff;
}

#main .container {
	background: #ffffff;
	overflow: hidden;
	padding-top: 10px;
}

#main .container .container {
	padding: 0;
	position: relative;
	z-index: 1;
}

#main .content {
	clear: both;
	overflow: hidden;
}

#main .green-bar {
	margin: 0 0 10px 13.5%;
	border-top: 3px solid #878683;
	border-left: 3px solid #878683;
	border-bottom: 3px solid #878683;
	-webkit-border-radius: 80px 0 0 80px; 
  	-moz-border-radius: 80px 0 0 80px; 
  	border-radius: 80px 0 0 80px; 
  	clear: both;
  	overflow: hidden;
  	background: #45ab5a;
  	padding: 10px 0;
}

#main .green-content {
	max-width: 605px;
	margin: 0 20%;
}

#main .green-content table {
	border: none;
	background: unset;
}

#main .green-content table td {
	font-weight: 600;
	font-size: 20px;
	line-height: 22px;
	margin: 0 0 10px 0;
	color: #000;
	padding: 3px;
}

 
 
/*table*/
div.table {
	clear: both;
	margin: 0;
}

.table .table {
	background: none;
}

table {
	width: 100%;
	border: none;
	background: #fff;
	border-spacing: 2px !important;
	border-collapse: unset !important;
}

.table table th {
	color: #4b4b4b;
	padding: 13px 30px !important;
	font-size: 14px;
	border: none !important;
	font-weight: 600;
	margin: 1px;
	-moz-box-shadow: inset 0 0 10px #bcc1bd;
	-webkit-box-shadow: inset 0 0 10px #bcc1bd;
	box-shadow: inset 0 0 10px #bcc1bd;
}

.table table td {
	color: #5c5c5c;
	padding: 13px 30px !important;
	font-size: 14px;
	border: none !important;
	font-weight: normal;
	margin: 1px;
	-moz-box-shadow: inset 0 0 10px #bcc1bd;
	-webkit-box-shadow: inset 0 0 10px #bcc1bd;
	box-shadow: inset 0 0 10px #bcc1bd;
}

.table table td a {
	color: #4f9778;
	text-decoration: none;
}

.table table td a:hover, .table table td a:active, .table table td a:focus {
	color: #063f5b;
	text-decoration: none;
}

.table table td .fa {
	padding: 0 6px;
	color: #063f5b;
	transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
}

.table table td .fa:hover, .table table td .fa:focus, .table table td .fa:active {
	color: #fff;
}

.table table tr {
	transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
}

.table table tr:hover td {
	background: #fff;
	color: #000;
	-moz-box-shadow: inset 0 0 15px #5ed973;
	-webkit-box-shadow: inset 0 0 15px #5ed973;
	box-shadow: inset 0 0 15px #5ed973;

	transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
}

.table table tr:hover td .fa {
	color: #063f5b;
}

.table table td input[type="checkbox"] {
	background: #063f5b;
	display: inline-block;
	margin: 0 30px 0 0;
}
 
/* =Footer
-------------------------------------------------------------- */

#footer {
	padding: 30px 0 5px;
	clear: both;
	font-size: 16px;
	color: #000;
	margin: 0;
	background: #fff;
	overflow: hidden;
	border-bottom: 15px solid #45ab5a;
}

#footer .socialmedia {
	text-align: right;
	clear: both;
	overflow: hidden;
	margin: 0 0 25px 0;
}

#footer .socialmedia h3 {
	display: inline-block;
	margin: 0 15px 0 0;
}

#footer .socialmedia img {
	display: inline-block;
	margin: 0 15px 15px;
}

#footer .socialmedia a img:hover {
	transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;

    opacity: 0.4;
    filter: alpha(opacity=40); /* For IE8 and earlier */
}


/* =Form Elements
-------------------------------------------------------------- */
.form-control {
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555;
    display: block;
    font-size: 14px;
    height: 34px;
    line-height: 1.42857;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
}

.form-block input[type="text"],
.form-block input[type="email"],
.form-block select {
	-webkit-border-radius: 10px; 
  	-moz-border-radius: 10px; 
  	border-radius: 10px; 
  	-moz-box-shadow:    inset 0 0 10px #c2c2c3;
   	-webkit-box-shadow: inset 0 0 10px #c2c2c3;
   	box-shadow:         inset 0 0 10px #c2c2c3;
   	font-style: italic;
   	color: #8b8b8b;
   	font-weight: normal;
   	height: 27px;
   	padding: 2px 10px;
}

#footer-mailing-form input[type="text"],
#footer-mailing-form input[type="email"],
#footer-mailing-form select {
	-webkit-border-radius: 8px; 
  	-moz-border-radius: 8px; 
  	border-radius: 8px; 
  	-moz-box-shadow:    inset 0 0 10px #bbbbbb;
   	-webkit-box-shadow: inset 0 0 10px #bbbbbb;
   	box-shadow:         inset 0 0 10px #bbbbbb;
   	font-style: italic;
   	color: #838383;
   	font-weight: normal;
}

.styled-select {
   	width: 100%;
   	height: 27px;
   	overflow: hidden;
   	overflow: -moz-hidden-unscrollable;
   	border: none;
   	display: inline-block;
   	position:relative;

}

.styled-select select {
   appearance:none;
   -moz-appearance:none; /* Firefox */
   -webkit-appearance:none; /* Safari and Chrome */
 
   background: #fff url(../img/email/miniaccountcreated/dropdown-arrow-bg.gif) no-repeat right top;
   -webkit-border-radius: 8px; 
  	-moz-border-radius: 8px; 
  	border-radius: 8px; 
  	-moz-box-shadow:    inset 0 0 10px #bbbbbb;
   	-webkit-box-shadow: inset 0 0 10px #bbbbbb;
   	box-shadow:         inset 0 0 10px #bbbbbb;
   	font-style: italic;
   	color: #838383;
   	font-weight: normal;
 }

 /* =Image Elements
-------------------------------------------------------------- */

img.aligncenter {
	display: block;
	margin: 0 auto 25px auto !important;
}

img.alignleft {
	float: left;
	margin: 4px 25px 25px 0 !important;
}

img.alignright {
	float: right;
	margin: 4px 0 25px 25px !important;
}



/*button*/
.share-btn {
	display: inline-block;
	padding: 0 50px;
	height: 32px;
	line-height: 30px;
	border: 1px solid #404141;
	-moz-box-shadow:    inset 0 0 20px #00d2ff;
   	-webkit-box-shadow: inset 0 0 20px #00d2ff;
   	box-shadow:         inset 0 0 20px #00d2ff;
   	font-size: 18px;
   	color: #000;
   	background: #fff;
   	text-decoration: none;
   	-webkit-border-radius: 6px; 
  	-moz-border-radius: 6px; 
  	border-radius: 6px; 
  	font-weight: 600;
  	transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
}

.share-btn:hover, .share-btn:active, .share-btn:focus {
	background: #fff;
	-moz-box-shadow:    inset 0 0 20px #5ed973;
   	-webkit-box-shadow: inset 0 0 20px #5ed973;
   	box-shadow:         inset 0 0 20px #5ed973;
   	color: #000;
   	text-decoration: none;
}

.modal-btn {
	display: inline-block;
	padding: 0 50px;
	height: 32px;
	line-height: 30px;
	border: 1px solid #404141;
	-moz-box-shadow:    inset 0 0 20px #00d2ff;
   	-webkit-box-shadow: inset 0 0 20px #00d2ff;
   	box-shadow:         inset 0 0 20px #00d2ff;
   	font-size: 18px;
   	color: #000;
   	background: #fff;
   	text-decoration: none;
   	-webkit-border-radius: 6px; 
  	-moz-border-radius: 6px; 
  	border-radius: 6px; 
  	font-weight: 600;
  	transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
}

.modal-btn:hover, .modal-btn:active, .modal-btn:focus {
	background: #fff;
	-moz-box-shadow:    inset 0 0 20px #5ed973;
   	-webkit-box-shadow: inset 0 0 20px #5ed973;
   	box-shadow:         inset 0 0 20px #5ed973;
   	color: #000;
   	text-decoration: none;
}

.small-btn {
	display: inline-block;
	padding: 0 15px;
	height: 32px;
	line-height: 30px;
	border: 1px solid #404141;
	-moz-box-shadow:    inset 0 0 20px #00d2ff;
   	-webkit-box-shadow: inset 0 0 20px #00d2ff;
   	box-shadow:         inset 0 0 20px #00d2ff;
   	font-size: 14px;
   	color: #000;
   	background: #fff;
   	text-decoration: none;
   	-webkit-border-radius: 6px; 
  	-moz-border-radius: 6px; 
  	border-radius: 6px; 
  	font-weight: 600;
  	transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
}

.small-btn:hover, .small-btn:active, .small-btn:focus {
	background: #fff;
	-moz-box-shadow:    inset 0 0 20px #5ed973;
   	-webkit-box-shadow: inset 0 0 20px #5ed973;
   	box-shadow:         inset 0 0 20px #5ed973;
   	color: #000;
   	text-decoration: none;
}

#MainWalletModal .verification-box .modal-btn {
	padding: 0 13px;
	margin: 3px 0;
}

input[type="file"] {
	display: inline-block;
}

.middle-btn {
	margin: 0 20px;
}

.clear {
	overflow: hidden;
	clear: both;
}

/* =Media Queries
-------------------------------------------------------------- */

@media only screen and (min-width: 1200px) and (max-width: 1280px) {

	 
} 

@media only screen and (min-width: 1024px) and (max-width: 1199px) {

	.container {
		width: auto;
	}


} 

@media only screen and (min-width: 768px) and (max-width: 991px) {

	.container {
		width: auto;
	}

	#main .green-bar {
		margin: 0 0 10px 0;
		-webkit-border-radius: 0px; 
  		-moz-border-radius: 0px; 
  		border-radius: 0px; 
  		border-left: none;
	}

	#main .green-content {
		margin: 0;
	}

	#footer .footer-logo {
		margin: 0 0 40px;
	}

}

@media only screen and (min-width: 569px) and (max-width: 767px) {

	.container {
		width: auto;
	}

	#main .green-bar {
		margin: 0 0 10px 0;
		-webkit-border-radius: 0px; 
  		-moz-border-radius: 0px; 
  		border-radius: 0px; 
  		border-left: none;
	}

	#main .green-content {
		margin: 0;
	}

	#footer .footer-logo {
		margin: 0 0 40px;
	}

}

@media only screen and (max-width: 568px) { 
	
	.container {
		width: auto;
	}

	#main .green-bar {
		margin: 0 0 10px 0;
		-webkit-border-radius: 0px; 
  		-moz-border-radius: 0px; 
  		border-radius: 0px; 
  		border-left: none;
	}

	#main .green-content {
		margin: 0;
	}

	#footer .footer-logo {
		margin: 0 0 40px;
	}

}


@media only screen and (max-width: 320px) { 

	.container {
		width: auto;
	}

	#main .green-bar {
		margin: 0 0 10px 0;
		-webkit-border-radius: 0px; 
  		-moz-border-radius: 0px; 
  		border-radius: 0px;
  		border-left: none; 
	}

	#main .green-content {
		margin: 0;
	}

	#footer .footer-logo {
		margin: 0 0 40px;
	}
	 
} 
	</style>
</head>
<body>
	
  <header id="header">
    
    <div class="header-title">
    	<h1>Congratulations on opening an IntactFX trading account!</h1>
    </div>

  </header><!--/ header -->

  <section id="main">
    <div class="container">
        <h2>Your trading account have been created. Here is your IntactFX Trading Account details:</h2>
    </div><!--/ container -->
    <div class="green-bar">
    	<div class="green-content">
    		<table>
    			<tr>
    				<td>Trading Account Number:</td>
    				<td class="text-right">{{ $account['login'] }}</td>
    			</tr>
    			<tr>
    				<td>Trader’s Password:</td>
    				<td class="text-right"> {{ $account['password'] }}</td>
    			</tr>
    			<tr>
    				<td>Investor’s Password:</td>
    				<td class="text-right">{{ $account['password_investor'] }} </td>
    			</tr>
    			<tr>
    				<td>Trading Server Address:</td>
    				<td class="text-right">real1.intactfx.com:443</td>
    			</tr>
    			<tr>
    				<td>Email:</td>
    				<td class="text-right">{{ $user->email }}</td>
    			</tr>
    		</table>
    	</div>
    </div>
    <div class="container">
    	<h2>If you have questions, comments or trouble logging in, please <a href="#">Contact Us</a></h2>
    	<h3>Thank you!</h3>
    	<h3>IntactFX Support Department</h3>
    	<h3><a href="#http://www.intactfx.com" target="_blank">http://www.intactfx.com</a></h3>

    	<hr />

    	<h2>How to use the details?</h2>
    	<h3 class="clear"><span class="semibold">1. Trading Account Number</span> <span class="fr">- your “Login" for the MetaTrader 4 Trading Terminal.</span></h3>
    	<h3 class="clear"><span class="semibold">2. Trader’s Password</span> <span class="fr">- auto generated password used to access the trading account in MetaTrader 4</span></h3>
    	<h3 class="clear"><span class="semibold">3. Investor’s Password</span> <span class="fr text-right">- used to access the trading account in MetaTrader 4 but only to review 
    							<br />account activities. The Investor`s password does not allow trading operations' execution. </span></h3>
    	<h3 class="clear"><span class="semibold">4. Trading Server Address</span> <span class="fr">- to be put in server section in MetaTrader 4 Trading Terminal.</span></h3>
    	<div class="gap"></div>
    	<h3 class="text-center semibold">We wish you success in trading using IntactFX | Making A Difference</h3>

    	<hr />

    	<h2>What’s next?</h2>
    	<h3>1. <a href="#">Login</a> to your E-Office</h3>
    	<h3>2. <a href="#">Upload</a> your ID for account verification before you can start request for withdrawal</h3>
    	<h3>3. <a href="#">Deposit</a> your account as minimum of 25$ to start your trading</h3>
    	<h3>4. <a href="#">Download</a> and install Metatrader 4. Go to Appstore for ios and Google Playstore for Android device</h3>

    	<hr />
    	<p class="text-center">If you would like to unsubscribe and stop receiving our newsletters, please click <a href="#">here</a></p>
    </div>

  </section><!--/ section main -->
 

  <footer id="footer">
  	<div class="container">
	    <div class="col-md-4">
	        <img src="{{url('img/email/miniaccountcreated/footer-logo.png')}}" alt="footer logo" title="intactfx" class="footer-logo" />
	    </div>
	    <div class="col-md-8">
	    	<div class="socialmedia">
	    		<h3 class="semibold">Connect with us:</h3>
	    		<a href="#"><img src="{{url('img/email/miniaccountcreated/facebook.png')}}" alt="facebook" title="facebook" /></a>
	    		<a href="#"><img src="{{url('img/email/miniaccountcreated/google.png')}}" alt="google" title="google" /></a>
	    		<a href="#"><img src="{{url('img/email/miniaccountcreated/twitter.png')}}" alt="twitter" title="twitter" /></a>
	    		<a href="#"><img src="{{url('img/email/miniaccountcreated/pinterest.png')}}" alt="pinterest" title="pinterest" /></a>
	    		<a href="#"><img src="{{url('img/email/miniaccountcreated/linkedin.png')}}" alt="linkedin" title="linkedin" /></a>
	    	</div>
	    	<h3 class="semibold text-right">Intact Group Corporation</h3>
	    	<h3 class="text-right">455, Foggy Heights, AZ 85004 United Kingdom</h3>
	    	<h3 class="text-right">Contact us: (602) 519-0450 &nbsp;|&nbsp; Email us: support@intactfx.com</h3>
	    </div>
	    <div class="clear"></div>
	    <hr />
	    <p class="text-center">Intact Group Corporation, 2014 - 2016 &nbsp;|&nbsp; <a href="#">Privacy Policy</a> &nbsp;|&nbsp; <a href="#">Legal</a></p>

	    <div class="gap"></div>

	    <p class="text-center semibold nomargin">Do not print this message unless it is necessary, consider the environment.</p>
    </div>
  </footer><!--/ footer -->

</body>
</html>