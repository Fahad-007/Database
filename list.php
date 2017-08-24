<?php 

require_once('db.php');

$get_query = mysqli_query($connection,"SELECT * FROM student_info");

$students = [];

while ($row = mysqli_fetch_assoc($get_query)) {
	$students[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<style>
		.form_wrapper {
			width: 90%;
			margin: 20px auto;
		}
	</style>
</head>
<body>
	
<div class="form_wrapper">
	<div class="panel  panel-warning">
		<div  class="panel-heading">
			<h1>Student List</h1> 
			<ul>
				<li><a href="index.php">Add new member</a></li>
				<li><a href="list.php" style="color: #804000">Students list</a></li>
			</ul>
		</div>
		<div class="panel-body">
			<table class="table table-hover table-inverse">
				<thead class="thead-inverse">
					<tr>
						<th>SN</th>
						<th>Frist name</th>
						<th>Last name</th>
						<th>Email</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($students as $value) : ?>
						<tr>
							<td><?= $value['id']; ?></td>
							<td><?= $value['first_name']; ?></td>
							<td><?= $value['last_name']; ?></td>
							<td><?= $value['email_id']; ?></td>
							<td><a href="edit.php?id=<?= $value['id']; ?>"class="btn btn-sm btn-info">edit</a></td>
							<td><a onclick="return confirm('Are you sure')" href="list.php?idd= <?php echo $value['id']; ?>"class="btn btn-sm btn-danger">Delete</a></td>
						</tr>
						<?php 
							if (isset($_GET['idd'])) {
								$idd = $_GET['idd'];
								$result = $connection->query("DELETE FROM student_info WHERE id='$idd'");
								if ($result) {
									header("location: list.php");
								}else{
									?>
									<script>
										alert("Fail to delete data");
										window.location.href='list.php';
									</script>
									<?php
								}
							}
						 ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</body>
</html>