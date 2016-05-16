<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

</head>
<body>
	<h1>Thank you for signing up!</h1>
	<p>
		here's your affiliate link {{ url('user/register/?eoffice_id='.$account->id) }}
	</p>
</body>
</html>