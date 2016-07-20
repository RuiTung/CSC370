<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<form action="pubPost.php" method="post">
Input the post information to add the post:
<br>
<br>
Post Title:&nbsp<input type="text" name="title">
<!-- <br>
<br>
Creator: &nbsp&nbsp<input type="text" name="creator"> -->
<br>
<br>
Content: &nbsp&nbsp<input type="text" name="content">
<br>
<br>
URL: &nbsp&nbsp&nbsp&nbsp<input type="text" name="url">
(if it is a link post)
<br>
<br>
Subsaiddit:&nbsp<input type="text" name="subsaiddit">
<br>
<br>
<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="submit">

</form>

</body>
</html>