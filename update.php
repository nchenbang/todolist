<?php
require "connection.php";

$response = new \stdClass();
$response->successful = false;

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['duedate'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$rawdate = $_POST['duedate'];	
	$duedate = DateTime::createFromFormat('Y-m-d', $rawdate)->format('Y-m-d');
	try {
		$sql = "UPDATE todo SET name = :name, description = :description, date_due = :duedate WHERE id = :id";
		$statement = $conn->prepare($sql);
		$statement->bindParam (":name", $name, PDO::PARAM_STR);
		$statement->bindParam (":description", $description, PDO::PARAM_STR);
		$statement->bindParam (":duedate", $duedate, PDO::PARAM_STR);
		$statement->bindParam (":id", $id, PDO::PARAM_INT);
		$success = $statement->execute();

		$conn = null;        // Disconnect
	}
	catch(PDOException $e) {
		$response->error = $e->getMessage();
	}

	$response->successful = $success;
}
echo json_encode($response);
?>