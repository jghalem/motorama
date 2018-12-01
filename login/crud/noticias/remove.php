<?php
 
require_once "../db_connect.php";

require_once "../../validar.php";
 
if($_REQUEST) {
    $id = $_GET['id'];

    if ($_SESSION['tipo_usuario'] == "1") 
    {
    $sql = "DELETE FROM noticias WHERE id_noticia = {$id}";
    }
    else if ($_SESSION['tipo_usuario'] !== "1") 
    {
        echo "<p>Erro: Você precisa ser um administrador para apagar notícias!</p>";
        echo "<a href='../../index.php'><button type='button'>Início</button></a>";
        exit;
    }
    if($connect->query($sql) === TRUE) {
        echo "<p>Notícia apagada com sucesso!</p>";
        echo "<a href='../../index.php'><button type='button'>Início</button></a>";
        exit;
    } else {
        echo "Erro ao apagar notícia: " . $connect->error;
    }
 
    $connect->close();
}
 
?>