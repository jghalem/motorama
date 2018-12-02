<?php
require_once "crud/db_connect.php";


echo '<form method="post" action="crud/usuarios/create.php">';
echo 'CADASTRO</br></br></br>';
echo 'Nome: <input type="text" name="nome"></br>';
echo 'Username: <input type="text" name="username"></br></br>';
echo 'senha: <input type="text" name="senha"></br>';
echo 'email: <input type="text" name="email"></br></br>';
echo 'data de nascimento: <input type="text" name="data_nasc"></br>';
/*echo 'data de criação: <input type="text" name="data_conta"></br>';*/
echo 'Foto: <input type="text" name="foto"></br></br>';
echo 'Tipo do Usuario: <input type="text" name="tipo_usuario"></br></br>';


echo '<button type="submit">Enviar</button></form><a href="index.php"><button type="text">Voltar</button></a>';
?>