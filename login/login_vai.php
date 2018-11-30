<?php 
// Conexão com o banco de dados 
require "comum.php"; 

// Inicia sessões 
session_start(); 

// Recupera o login 
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE; 

// Usuário não forneceu a senha ou o login 
if(!$login ) 
{ 
echo "Você deve digitar sua senha e login!"; 
exit; 
} 

/** 
* Executa a consulta no banco de dados. 
* Caso o número de linhas retornadas seja 1 o login é válido, 
* caso 0, inválido. 
*/ 
$SQL = "SELECT id_usuario, nome, login, senha, user_type, 
FROM usuarios 
WHERE login = ".$login.""; 


//$result_id = @mysql_query($SQL) or die("Erro no banco de dados!"); 
//$total = @mysql_num_rows($result_id); 

$res = $MySQLiconn->query("SELECT * FROM usuarios WHERE login = '".$login."'");
$row=$res->fetch_array();

/*	
echo $row['id']; 
echo $row['nome']; 
echo $row['login']; 
echo $row['senha']; 
echo $row['postar']; 
*/

//$res = $MySQLiconn->query("SELECT * FROM noticia");
//$row=$res->fetch_array();


// Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
if($row) 
{ 
// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
//$dados = @mysql_fetch_array($result_id); 

// Agora verifica a senha 
//echo "<br/> form". $senha;
//echo "<br/>session ". $row["senha"];
if(!strcmp($senha, $row["senha"])) 
{ 
// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
$_SESSION["id_usuario"]= $row["id_usuario"]; 
$_SESSION["nome"] = stripslashes($row["nome"]); 
$_SESSION["user_type"] = $row["user_type"];
/*$_SESSION["permissao"]= $row["postar"];*/ 
header("Location: index.php"); 
exit; 

} 
// Senha inválida 
else 
{ 

echo "Senha inválida!"; 
exit; 
} 
} 
// Login inválido 
else 
{ 
echo "O login fornecido por você é inexistente!"; 
exit; 
} 
?>