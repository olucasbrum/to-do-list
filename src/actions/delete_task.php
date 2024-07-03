<?php
// conexão com o db
include '../../db_connection.php';

// verificar o id  na url
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // deletar task do db
    $sql = "DELETE FROM tasks WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // redirecionar para a pag inicial depois de delete
        header("Location: ../includes/index.php");
        exit();
    } else {
        echo "Erro ao deletar a tarefa: " . $conn->error;
    }
} else {
    echo "ID da tarefa não fornecido.";
    exit();
}

$conn->close();
?>
