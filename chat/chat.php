<?php
require_once('db.php');
	$query = "SELECT * FROM chat ORDER BY id DESC ";
	$run_query = $connection->query($query);
	while($row = $run_query->fetch_array()):
	?>
	<div id="chat_data">
		<span style="color: blue;"><?php echo $row['name']; ?>: </span>
		<span style="color:white;"><?php echo $row['msg']; ?> </span>

		<span style=" color:blue; float: right;"><?php echo $row['date'];?>
			<span><a style="color:red; text-decoration: none;" href="index.php?delete=<?php echo $row['id']?>">Delete</a></span>
		</span>
	</div>
<?php endwhile; ?>
