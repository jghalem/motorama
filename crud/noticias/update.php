<?php 
 
require_once '../db_connect.php';
 
if($_POST) {
    $cr_titulo = $_POST['titulo'];
    $cr_par1 = $_POST['par1'];
    $cr_img1 = $_POST['img1'];
    $cr_par2 = $_POST['par2'];
    $cr_img2 = $_POST['img2'];
    $cr_par3 = $_POST['par3'];
    $cr_img3 = $_POST['img3'];
    $cr_par4 = $_POST['par4'];
    $cr_img4 = $_POST['img4'];
 
    $id = $_POST['id'];
 
    $sql = "UPDATE members SET titulo = '$cr_titulo', par1 = '$cr_par1', img1 = '$cr_img1', par2 = '$cr_par2', img2 = '$cr_img2', par3 = '$cr_par3', img3 = '$cr_img3', par4 = '$cr_par4', img4 = '$cr_img4' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Usuário atualizado com sucesso!</p>";
        echo "<a href='../edit.php?id=".$id."'><button type='button'>Voltar</button></a>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro atualizando usuário : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>