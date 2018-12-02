<?php 
 
require "../db_connect.php";
 
if($_POST) {
    $cr_nome = $_POST['nome'];
    $cr_username = $_POST['username'];
    $cr_senha = $_POST['senha'];
    $cr_email = $_POST['email'];
	$cr_data_nasc = $_POST['data_nasc'];
	/*$cr_data_registro = $_POST['data_conta'];*/
	$cr_foto = $_POST['foto'];
	$cr_tipo_usuario  = $_POST['tipo_usuario'];
 
    $sql = "INSERT INTO usuarios (nome, username, senha, email, data_nasc, foto, tipo_usuario) VALUES ('$cr_nome', '$cr_username', '$cr_senha', '$cr_email', '$cr_data_nasc', '$cr_foto', '$cr_tipo_usuario' )";
    if($connect->query($sql) === TRUE) {
        echo "<p>Usuário criado com sucesso!</p>";
        echo "<a href='../../login.html'><button type='button'>Voltar</button></a>";
        echo "<a href='../../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro ao criar o usuario: " . $connect->error;
    }
 
    $connect->close();
}
 
?>