<?php require_once("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>chat</title>
	<link rel="stylesheet" href="style.css">
	<script>
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if(req.readyState == 4 && req.status ==200){
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET','chat.php',true);
			req.send();
		}
		setInterval(function(){ajax()}, 1000);
	</script>
</head>
<body onload="ajax();">
	<div id="container">
		<h1 style="color: white; text-align: center;">Funn with Messages</h1>
		<div id="chat_box">
		<div id="chat"></div>
		</div>
  <form action="index.php" method="post">
  	<input type="text" name="name" placeholder="Enter your name">
  	<textarea name="message"  placeholder=" Enter message"></textarea>
  	<input type="submit" name="submit" value="Send Message">
  </form>
  <?php 
  if(isset($_POST['submit'])){
  	$name = $_POST['name'];
  	$message = $_POST['message'];
  	if(!empty($name) && !empty($message)){
  	$insert_query = "INSERT INTO chat (name, msg) VALUES('$name','$message') ";
  	$run = $connection->query($insert_query);
  	if(!$run){
  		die("Failed" . mysqli_error($connection));
  	  }
  	}
  	else {
  		echo "";
  	}
  }
   ?>
</div>
</body>
</html>
<?php 
	if(isset($_GET['delete'])){
	$delete = $_GET['delete'];
	$del_query = "DELETE FROM chat WHERE id = '$delete' ";
	$del = $connection->query($del_query);
	header("Location:index.php");
	if(!$del){
		die("Failed" . mysqli_error($connection));
	}
}
?>