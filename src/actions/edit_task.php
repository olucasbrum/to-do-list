<?php
include '../../db_connection.php';

// verificar se o id da tarefa foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // buscar a tarefa no db
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $task = $result->fetch_assoc();
    } else {
        echo "Tarefa não encontrada.";
        exit();
    }
} else {
    echo "ID da tarefa não fornecido.";
    exit();
}

// verificar se o form foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    // atualizar task no db
    $sql = "UPDATE tasks SET titulo='$titulo', descricao='$descricao' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // redirecionar para a pg inicial depois do updt
        header("Location: ../includes/index.php");
        exit();
    } else {
        echo "Erro ao atualizar a tarefa: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <h1>Editar Tarefa</h1>
    </header>
    <main>
        <section id="edit-task">
            <h2>Editar Tarefa</h2>
            <form action="" method="post">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $task['titulo']; ?>" required>
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required><?php echo $task['descricao']; ?></textarea>
                <button type="submit">Atualizar Tarefa</button>
            </form>
        </section>
    </main>

</body>
</html>
