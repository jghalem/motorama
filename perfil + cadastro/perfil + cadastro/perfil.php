<?php

require_once "validar.php"; 


require_once "crud/db_connect.php"; 


echo '<body bgcolor="#e6e6e6">';
echo "<font face=\"Verdana\" size=2>Bem Vindo, " . ucfirst($_SESSION["nome"]) . "!\n"; 

echo "<font face=\"Verdana\" size=2>Você está vendo o seu perfil " . ucfirst($_SESSION["id_usuario"] == 'id_usuario') . "!\n"; 


if ($_SESSION['tipo_usuario'] == '1')
{
echo " | <a href='index.php'><button type='text'>Voltar</button></a>\n";


echo "</br></br>\n"; 
}


else if ($_SESSION['tipo_usuario'] !== '1')
{
echo " | <a href='index.php'><button type='text'>Voltar</button></a>"; 
echo "</br></br>\n"; 
}






$SQL = "SELECT * FROM usuarios WHERE id_usuario =" .$_SESSION['id_usuario'];




$result = $connect->query($SQL);

if($result->num_rows <> 0) 
{ 
 
echo "<table border=1 cellpadding=5 cellspacing=0>\n";
echo "<tr><th>FOTO</th><th>Nome</th><th>username</th><th>Data de Nascimento</th><th>Conta Criada em:</th>";


while($dados=$result->fetch_array())
//while($dados = mysql_fetch_array($result_id)) 
{ 
echo "<tr><td><img src='" . $dados["foto"] . "' alt='foto'></td><td>";
echo "".$dados["nome"]. "";
echo "</a></td>"; 

echo "<td>" .  $dados["username"] . "</td>\n";

echo "<td>{$dados['data_nasc']}</td></tr>";
echo "<td>{$dados['data_conta']}</td></tr>";
} 

// Fecha tabela 
echo "</table>\n"; 
} 
else 
{ 
echo "<B>Nada de interessante aqui!</B>\n"; 
} 



?>