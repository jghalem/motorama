<?php 
 
require "../db_connect.php";
 
if($_POST) {
    $id = $_POST['id_usuario'];

    if ($_POST['user_type'] == "administrador")
    {
    $sql = "DELETE FROM usuarios WHERE id_usuario = {$id}";
    }
    else if ($_POST['user_type'] !== "administrador")
    {
        echo "<p>Erro: Você precisa ser um administrador para apagar usuários</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
        exit
    }
    if($connect->query($sql) === TRUE) {
        echo "<p>Usuário apagado com sucesso!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro ao apagar usuário: " . $connect->error;
    }
 
    $connect->close();
}
 
?>