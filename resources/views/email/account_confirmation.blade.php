<!DOCTYPE html>
<html>
<head>
	<title>Account confirmation</title>
</head>
<body>
<table>
	<tr>
		<td>Dear {{ $name }}</td>
	</tr>
	<tr>
		<td>
			Check bellow link to active your account:<br> <a href="{{ url('confirm/'.$code)}}">Account confirmation link</a>
		</td>
	</tr>
	<tr>
		<td>Thanks to stay with Web Journey</td>
	</tr>
</table>
</body>
</html>