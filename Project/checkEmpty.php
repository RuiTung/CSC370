<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
$username=$_POST["username"];
$password=$_POST["password"];
if(empty($_POST["username"])||empty($_POST["password"])){
	header("refresh:2;url=http://localhost/login.php");
	echo "Please fill the blank.";
	exit(0);
} else {
	header("refresh:2;url=http://localhost/check.php");
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	//echo $_SESSION['password'];
}
?>
</body>
</html>