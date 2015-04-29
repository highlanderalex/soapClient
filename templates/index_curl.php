<!DOCTYPE html>
<html>
<head>
<title>Football</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
	<div style="float:right; margin-right:20px;color:red;width:130px;">
		<?=$val;?>
	</div>
	<div style="float:right; margin-right:10px;">
	<form action="index_curl.php" method="post">
		<select name="from">
			<option value="USD" selected>USD</option>
			<option value="UAH">UAH</option>
			<option value="RUB">RUB</option>
		</select>
		/
		<select name="to">
			<option value="UAH" selected>UAH</option>
			<option value="USD">USD</option>
			<option value="RUB">RUB</option>
		</select>
		<input type="submit" name="send" value="go">
	</form>
	</div>
	<h1 align="center">FIFA Team</h1>
     <table class="table table-striped">
		<?=$data;?>
	</table>
</body>
</html>
