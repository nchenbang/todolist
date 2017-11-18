<?php
// Connection data (server_address, database, name, poassword)
$hostdb = 'localhost';
$namedb = 'dad';
$userdb = 'root';
$passdb = '';

$conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
?>