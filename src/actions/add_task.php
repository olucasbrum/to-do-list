<?php
include '../../db_connection.php';

// verif se o form foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // pegar os dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    // inserir os dados da task
    $sql = "INSERT INTO tasks (titulo, descricao) VALUES ('$titulo', '$descricao')";

    // exec a instrução sql
    if ($conn->query($sql) === TRUE) {
          header("Location: ../includes/index.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
