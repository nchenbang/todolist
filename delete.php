<?php
require "connection.php";

$response = new \stdClass();
$response->successful = false;

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	try {
		$sql = "DELETE FROM todo WHERE id = :id";
		$statement = $conn->prepare($sql);
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