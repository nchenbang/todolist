<?php
require "connection.php";

$response = new \stdClass();
$response->successful = false;

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['duedate'])) {
	$name = $_POST['name'];
	$description = $_POST['description'];
	$rawdate = $_POST['duedate'];	
	$duedate = DateTime::createFromFormat('Y-m-d', $rawdate)->format('Y-m-d');
	try {
		// Define an insert query
		$sql = "INSERT INTO todo (name, description, date_due) VALUES (:name, :description, :duedate)";
		$statement = $conn->prepare($sql);
		$statement->bindParam (":name", $name, PDO::PARAM_STR);
		$statement->bindParam (":description", $description, PDO::PARAM_STR);
		$statement->bindParam (":duedate", $duedate, PDO::PARAM_STR);
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