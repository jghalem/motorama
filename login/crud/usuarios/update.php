<?php 
 
require_once "../db_connect.php";
require_once "../../validar.php";
 
if($_POST) {
    $cr_nome = $_POST['nome'];
    $cr_username = $_POST['username'];
    $cr_senha = $_POST['senha'];
    $cr_email = $_POST['email'];
	$cr_data_nasc = $_POST['data_nasc'];
	$cr_data_registro = $_POST['data_registro'];
	$cr_foto = $_POST['foto'];
 
    $id = $_POST['id_usuario'];
 
    $sql = "UPDATE members SET nome = '$cr_nome', username = '$cr_username', senha = '$cr_senha', email = '$cr_email', data_nasc = '$cr_data_nasc', data_registro = '$cr_data_registro', foto = '$cr_foto' WHERE id_usuario = {$id}";
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