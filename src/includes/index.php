<?php include 'header.php'; ?>
<?php
include '../../db_connection.php';

// buscar todas as tarefas do bd
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<main>
    <section id="add-task">
        <h2>Adicionar Nova Tarefa</h2>
        <form action="../actions/add_task.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
            <button type="submit">Adicionar Tarefa</button>
        </form>
    </section>

    <section id="task-list">
        <h2>Lista de Tarefas</h2>
        <input type="text" id="search" placeholder="Buscar Tarefas..." onkeyup="filterTasks()">
        <table id="task-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Exibir cada tarefa
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td data-label='ID'>" . $row["id"] . "</td>";
                        echo "<td data-label='Título'>" . $row["titulo"] . "</td>";
                        echo "<td data-label='Descrição'>" . $row["descricao"] . "</td>";
                        echo "<td data-label='Status'>" . $row["status"] . "</td>";
                        echo "<td data-label='Ações'>
                                <a href='../actions/edit_task.php?id=" . $row["id"] . "' class='action-button'>Editar</a>
                                <a href='../actions/delete_task.php?id=" . $row["id"] . "' class='action-button' onclick='return confirm(\"Tem certeza que deseja excluir esta tarefa?\")'>Excluir</a>
                                <a href='../actions/mark_complete.php?id=" . $row["id"] . "' class='action-button'>Concluir</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhuma tarefa encontrada</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</main>

<?php

$conn->close();
?>
