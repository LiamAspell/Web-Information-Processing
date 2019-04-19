<?php  include('server.php'); 



	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM ebook_metadata WHERE id = $id");
		
		
		if(@count($record)==1){
		$n = mysqli_fetch_array($record);
		$id = $n['id'];
		$creator = $n['creator'];
		$title =  $n['title'];
		$type = $n['type'];
		$identifier = $n['identifier'];
		$date = $n['date'];
		$language =  $n['language'];
		$description = $n['description'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head> 
<title>CRUD: CReate, Update, Delete PHP MySQL</title>
<link rel ="stylesheet" href="stylesheet.css">
</head>

<body style = "background-color:#7f8c8d">

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">							
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


<?php $results = mysqli_query($db, "SELECT * FROM ebook_metadata"); ?>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Creator</th>
			<th>Title</th>
			<th>Type</th>
			<th>Identifier</th>
			<th>Date</th>
			<th>Language</th>
			<th>Description</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	
	<tbody>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['creator']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['identifier']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['language']; ?></td>
			<td><?php echo $row['description']; ?></td>
			<td>
				<a href="SPA.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>

	</tbody>
</table>




<form method="post" action="server.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			
			
		</div>
		<div class="input-group">
			<label>Creator</label>
			<input type="text" name="creator" value="<?php echo $creator; ?>">
		</div>
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value="<?php echo $title; ?>"> 
		</div>
		<div class="input-group">
			<label>Type</label>
			<input type="text" name="type" value="<?php echo $type; ?>"> 
		</div>
		<div class="input-group">
			<label>Identifier</label>
			<input type="text" name="identifier" value="<?php echo $identifier; ?>">
		</div>
		<div class="input-group">
			<label>Date (Format: YYYY-MM-DD)</label>
			<input type="text" name="date" value="<?php echo $date; ?>"> 
		</div>
		<div class="input-group">
			<label>Language</label>
			<input type="text" name="language" value="<?php echo $language; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>"> 
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
		</div>
	</form>


</body>


</html>
