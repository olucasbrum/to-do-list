<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "task_db";

// criando conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// verificando conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
