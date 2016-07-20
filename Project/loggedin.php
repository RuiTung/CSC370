<?php
ob_start();
session_start();
?>

<?php

DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', 'aza');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'PROJECT');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
 }
?>
<!DOCTYPE html>
<html>
<head>
<style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #999999}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>
</head>
<body>

<ul>
  <li class="dropdown">
    <a href="#" class="p">Populate</a>
    <div class="dropdown-content">
      <a href="http://localhost/addaccount2.php">Add an account</a>
      <a href="http://localhost/addCom2.php">Add a comment</a>
      <a href="http://localhost/likePost2.php">Like a post</a>
      <a href="http://localhost/isfriends2.php">Follow a user</a>
      <a href="http://localhost/addPost2.php">Create a post</a>
      <a href="http://localhost/addSubsaiddit2.php">Create a subsaiddit</a>
      <a href="http://localhost/subscriptions2.php">Follow a subsaiddit</a></li>
    </div>

  <li class="dropdown">
    <a href="#" class="l">Delete Post</a>
    <div class="dropdown-content">
      <a href="http://localhost/deletecontent.php">Delete Post</a></li>
    </div>
  <li><a href="http://localhost/login.php">Logout</a></li>
</ul>

</form>

</body>
</html>

<?php
$username=$_SESSION['username'];
$_SESSION['username']=$username;
$password=$_SESSION['password'];

//Display the content of the subscription
$content = "SELECT * FROM subscriptions, posts WHERE subscriptions.user = '$username' AND subscriptions.Subsaiddit = posts.Subsaiddit ORDER BY posts.upvotes DESC";

$result = $mysqli->query($content);
if ($result->num_rows > 0) {
     // output data of each row
    echo "<br>Dear ". $username. ", your subscriptions are: <br>";
    while($row = $result->fetch_assoc()) {
        echo "<br> Title: ". $row["title"];
       	echo "<br> Content: ". $row["content"];
        echo "<br> Up votes: ". $row["upvotes"];
        echo "<br> Down votes: ". $row["upvotes"];
        echo "<br> Publish Time: ". $row["publishTime"];
        echo "<br> Update Time: ". $row["updateTime"];
        echo "<br> Creator: ". $row["Subsaiddit"]. "<br>";
    }
} else {
    echo "<br>There is no subscriptions in your account.";
}

$mysqli->close();
?>