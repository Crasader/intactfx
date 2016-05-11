<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up Confimation</title>
</head>
<body>
	<h1>Thanks for signing up!</h1>
	<p>
			We just neet you to <a href="{{ url('user/activation/'.$token) }}">confirm your email addresss</a> real quick!
	</p>
</body>
</html>