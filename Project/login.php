<?php
ob_start();
session_start();
?>


<!DOCTYPE html>
<html>
<body>

<form action="checkEmpty.php" method = "post">
<b>User name:</b> <input value="" name= "username"><br>

<br>

<b>Password:</b> &nbsp <input type=password name= "password"><br>

<br>

<input type="submit">

<br>
<?php
 DEFINE('DB_USERNAME', 'root');
 DEFINE('DB_PASSWORD', 'aza');
 DEFINE('DB_HOST', 'localhost');
 DEFINE('DB_DATABASE', 'PROJECT');

 $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

 if (mysqli_connect_error()) {
 	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
 }

// Display the top voted posts from the default subsaiddits with descending sequence.
 $content = "SELECT * FROM posts, subsaiddit WHERE subsaiddit.isDefault = 1 AND subsaiddit.title = posts.subsaiddit ORDER BY posts.upvotes DESC";

$result = $mysqli->query($content);
if ($result->num_rows > 0) {
     // output data of each row
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
    echo "There is no subsaiddits.";
}
?>
</form>

<!--<p>Click the "Submit" button and the form-data will be sent to a page on the server called "demo_form.asp".</p> -->
</body>
</html>