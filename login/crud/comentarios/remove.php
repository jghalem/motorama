<?php 
 
require "../db_connect.php";
 
if($_POST) {
    $id = $_POST['id_comentario'];

    if ($_POST['tipo_usuario'] == "administrador")
    {
    $sql = "DELETE FROM comentarios WHERE id_comentario = {$id}";
    }
    else if ($_POST['tipo_usuario'] !== "administrador")
    {
        echo "<p>Erro: Você precisa ser um administrador para remover comentários!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
        exit
    }

    if($connect->query($sql) === TRUE) {
        echo "<p>Comentário apagado com sucesso!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro ao apagar comentário: " . $connect->error;
    }
 
    $connect->close();
}
 
?>