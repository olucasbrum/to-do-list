<?php
include '../../db_connection.php';

// verificar se o id da tarefa foi passado na url
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // atualizar status da tarefa para 'Concluída'
    $sql = "UPDATE tasks SET status='Concluída' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // redirecionar para a page inicial após a atualização estar ok
        header("Location: ../includes/index.php");
        exit();
    } else {
        echo "Erro ao atualizar a tarefa: " . $conn->error;
    }
} else {
    echo "ID da tarefa não fornecido.";
    exit();
}

$conn->close();
?>
