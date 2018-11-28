<?php 
 
require_once '../db_connect.php';
 
if($_POST) {
    $id = $_POST['id_noticia'];

    if ($_POST['tipo_usuario'] == "administrador") 
    {
    $sql = "DELETE FROM noticias WHERE id_noticia = {$id}";
    }
    else if ($_POST['tipo_usuario'] !== "administrador") 
    {
        echo "<p>Erro: Você precisa ser um administrador para apagar notícias!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
        exit;
    }
    if($connect->query($sql) === TRUE) {
        echo "<p>Notícia apagada com sucesso!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro ao apagar notícia: " . $connect->error;
    }
 
    $connect->close();
}
 
?>