<?php 
 
require_once '../db_connect.php';
 
if($_REQUEST) {
    $cr_titulo = $_REQUEST['titulo'];
    $cr_par1 = $_REQUEST['par1'];
    $cr_img1 = $_REQUEST['img1'];
    $cr_par2 = $_REQUEST['par2'];
    $cr_img2 = $_REQUEST['img2'];
    $cr_par3 = $_REQUEST['par3'];
    $cr_img3 = $_REQUEST['img3'];
    $cr_par4 = $_REQUEST['par4'];
    $cr_img4 = $_REQUEST['img4'];
    $cr_tipo_usuario = $_REQUEST['tipo_usuario'];
 
    $id = $_REQUEST['id'];
    if ($_REQUEST['tipo_usuario'] == "administrador")
    {
    $sql = "UPDATE noticias SET titulo = '$cr_titulo', par1 = '$cr_par1', img1 = '$cr_img1', par2 = '$cr_par2', img2 = '$cr_img2', par3 = '$cr_par3', img3 = '$cr_img3', par4 = '$cr_par4', img4 = '$cr_img4' WHERE id_noticia = {$id}";
    }
    /*else if ($_REQUEST['tipo_usuario'] !== "administrador")
    {
        echo "<p>Erro: Você precisa ser um administrador para editar notícias!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
        exit;
    }*/

    if($connect->query($sql) === TRUE) {
        echo "<p>Notícia atualizada com sucesso!</p>";
        echo "<a href='edit.php?id=".$id."'><button type='button'>Voltar</button></a>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro atualizando usuário : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>