<?php 
if(!empty($_POST['username']))
{
	mysql_connect();
	mysql_select_db('users');
	
	$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
	$password2= mysql_real_escape_string(htmlspecialchars($_POST['password2']));
	
	if ($password=$password2)
	{
		$username= mysql_real_escape_string(htmlspecialchars($_POST['username']));
		$email= mysql_real_escape_string(htmlspecialchars($_POST['email']));
		$cmac= mysql_real_escape_string(htmlspecialchars($_POST['cmac']));
		
		$hashedpass = password_hash($password, PASSWORD_DEFAULT);
		
		mysql_query("INSERT INTO validation VALUES('', '$username', '$hashedpass', '$email', '$cmac')");
		


	}
	else
	{
		echo 'The two passwords does not match ! Try again...' 
	}
}
?>

<h1><?= $title; ?></h1>

<?php echo DisplayAlert($alerte); ?>

<form method="POST" action="">
	
	<label>Username :</label>
	<input type="text"  name="username" />
	
	<label>Password :</label>
	<input type="password"  name="password"  />
	
	<label>Password2 :</label>
	<input type="password"  name="password2"  />
	
	<label>Email :</label>
	<input type="email"  name="email"  />
	
	<label>Cmac Address :</label>
	<input type="int"  name="cmac"  />
	

    <button type="submit" name="submit">Register</button>

</form>

<p><a href="index.php">Return</a></p>
