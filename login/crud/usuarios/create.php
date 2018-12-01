<?php 
 
require "../db_connect.php";
 
if($_POST) {
    $cr_nome = $_POST['nome'];
    $cr_username = $_POST['username'];
    $cr_senha = $_POST['senha'];
    $cr_email = $_POST['email'];
	$cr_data_nasc = $_POST['data_nasc'];
	$cr_data_registro = $_POST['data_registro'];
	$cr_foto = $_POST['foto'];
	
 
    $sql = "INSERT INTO usuarios (nome, username, senha, email, data_nasc, data_registro, foto) VALUES ('$cr_nome', '$cr_username', '$cr_senha', '$cr_email', '$cr_data_nasc', '$cr_data_registro', '$cr_foto')";
    if($connect->query($sql) === TRUE) {
        echo "<p>Usuário criado com sucesso!</p>";
        echo "<a href='../create.php'><button type='button'>Voltar</button></a>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>