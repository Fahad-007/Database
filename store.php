<?php
require_once("db.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_id = $_POST['email_id'];

$query = "INSERT INTO student_info(first_name,last_name,email_id) values('{$first_name}','{$last_name}','{$email_id}')";

$insert = mysqli_query($connection,"INSERT INTO student_info(first_name,last_name,email_id) values('{$first_name}','{$last_name}','{$email_id}')");

if($insert){
	?>
		<script>
			alert("Successfully data inserted");
			window.location.href='list.php';
		</script>
	<?php
}else{
	echo "Sorry try again";
}
