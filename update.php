<?php
require_once("db.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_id = $_POST['email_id'];
$id = $_POST['id'];


$query = "UPDATE student_info SET first_name = '{$first_name}', last_name = '{$last_name}',email_id = '{$email_id}' where id = {$id}";

$update = mysqli_query($connection,$query);

if($update){
	echo "Successfully data updated";
}else{
	echo mysqli_error($connection);
}
