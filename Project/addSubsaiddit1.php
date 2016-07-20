<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
$title=$_POST["title"];
$description=$_POST["description"];
//$creator=$_POST["creator"];
$creator = $_SESSION["username"];
$isDefault = $_POST["isDefault"];

//echo "$isDefault<br><br>";

if(empty($title)||empty($description)){
 	echo "please fill the blank.";
 	header("refresh:2;url=http://localhost/addSubsaiddit.php");
 	exit(0);
 }

DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', '12345');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'csc370');

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
 }

$findPost="SELECT * FROM subsaiddit WHERE title='$title'";
$find=$conn->query($findPost);
if($find->num_rows > 0){
	echo "This Subsaiddit exists.<br>Please try another one.";
	header("refresh:3;url='http://localhost/addSubsaiddit.php'");
}else{
	$addaSub="INSERT INTO subsaiddit(isDefault, title,founder) VALUES ($isDefault,'$title','$creator')";
	$add=$conn->query($addaSub);
	if($add === TRUE){
		echo "Subsaiddit adds successfully.<br>";
		echo "Back to front-page in 2 seconds.<br>";
		header("refresh:3;url='http://localhost/frontpage.php'");
		exit(0);
	}
}

?>

</body>
</html>