<?php
require "connection.php";

$response = new \stdClass();
$response->successful = false;

if (isset($_GET['name'])) {
	$name = "%" . $_GET['name'] . "%";
	try {
		// Define an insert query
		$sql = "SELECT name, description, date_due FROM todo WHERE name LIKE :name";
		$statement = $conn->prepare($sql);
		$statement->bindParam (":name", $name, PDO::PARAM_STR);
		$statement->execute();
		$response = $statement->fetchAll(PDO::FETCH_ASSOC);

		$conn = null;        // Disconnect
	}
	catch(PDOException $e) {
		$response->error = $e->getMessage();
	}
} else {
	try {
		$sql = "SELECT name, description, date_due FROM todo";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$response = $statement->fetchAll(PDO::FETCH_ASSOC);

		$conn = null;        // Disconnect
	}
	catch(PDOException $e) {
		$response->error = $e->getMessage();
	}
}
echo json_encode($response);
?>