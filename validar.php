<?php
require_once "crud/db_connect.php"

$sql = 'SELECT id_usuario,login,user_type from usuarios where id_usuario ='.$_POST['id'];
$resultado = $connect->query($sql);

$usuario = $resultado['id_usuario'];
$tipo = $resultado['user_type'];

if (empty($usuario))
{
    session_destroy();
    echo "Você foi desconectado. Retornando para a página inicial..";
    sleep(4);
    header("Location: index.php");
}

?>