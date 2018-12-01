<?php
// Verificador de sessão /* tudo oque for id_usuario renomeie para apenas "id"*/
require_once "validar.php"; 

// Conexão com o banco de dados 
require_once "crud/db_connect.php"; 

// Imprime mensagem de boas vindas 
echo '<body bgcolor="#e6e6e6">';
echo "<font face=\"Verdana\" size=2>Bem Vindo, " . ucfirst($_SESSION["nome"]) . "!\n"; 

// Verifica e imprime quantidade de notícias no nome do usuário 
//$SQL = "SELECT id FROM aut_noticias WHERE aut_usuario_id = " . $_SESSION["id_usuario"]; 
//$result_id = mysql_query($SQL) or die(mysql_error()); 
//$total = mysql_num_rows($result_id); 

// Contador de notícias
if ($_SESSION['tipo_usuario'] == '1')
{
$res = $connect->query("SELECT id_noticia FROM noticias WHERE original_poster = " .$_SESSION['id_usuario']);
$tot = 0;


while ($local = $res->fetch_array()) {
$tot++;
}

if(isset($tot))
{ 
echo "</br>Há um total de {$tot} notícia(s) de sua autoria!\n";
} 
else 
{ 
echo "</br>Não há nenhuma notícia de sua autoria!\n"; 
}

}

// Botões cabeçalho - administradores
if ($_SESSION['tipo_usuario'] == '1')
{
echo " | <a href='criar_noticia.php'><button type='text'>Postar nova notícia</button></a>\n";
echo " | <a href='editar_usuarios.php'><button type='text'>Modificar Usuários</button></a>";
echo " | <a href='editar_cargos.php'><button type='text'>Modificar Cargos</button></a>";
echo " | <a href='sair.php'><button type='text'>Sair do Sistema</button></a>"; 

echo "</br></br>\n"; 
}

// Botões cabeçalho - usuários
else if ($_SESSION['tipo_usuario'] !== '1')
{
echo " | <a href='sair.php'><button type='text'>Sair do Sistema</button></a>"; 
echo "</br></br>\n"; 
}


/** 
* Imprime as notícias de determinado usuario 
*/ 

$SQL = "SELECT id_noticia, titulo, par1, img1, par2, img2, par3, img3, par4, img4, data, original_poster FROM noticias ORDER BY data DESC";


/*$SQL = "SELECT id, titulo, data FROM aut_noticias WHERE aut_usuario_id = {$_SESSION['id_usuario']} ORDER BY data DESC";*/
//$result_id = mysql_query($SQL) or die(mysql_error()); 
//$total = mysql_num_rows($result_id); 

$result = $connect->query($SQL);

if($result->num_rows <> 0) 
{ 
// Abre tabela HTML 
echo "<table border=1 cellpadding=3 cellspacing=0>\n";
echo "<tr><th>ID</th><th>Título</th><th>Par 1</th><th>Img 1</th><th>Postado em:</th>";
if ($_SESSION['tipo_usuario'] == '1')
{
echo "<th>Opções</th></tr>\n";
}

// Efetua o loop no banco de dados 
while($dados=$result->fetch_array())
//while($dados = mysql_fetch_array($result_id)) 
{ 
echo "<tr><td>" . $dados["id_noticia"] . "</td><td>";
echo "<a href=ver_noticia.php?id=".$dados["id_noticia"]. ">" . stripslashes($dados["titulo"]);
echo "</a></td>"; 

echo "<td>" .  $dados["par1"] . "</td>\n";
echo "<td><img src=' " .  $dados["img1"] . "' alt='Img 1'></td>\n";
echo "<td>{$dados['data']}</td>";

if ($_SESSION['tipo_usuario'] == '1')
{
echo "<td><a href='editar_noticia.php?id=".$dados['id_noticia']."'><button type='text'>Editar</button></a>";
echo " | <a href='crud/noticias/remove.php?id=".$dados['id_noticia']."'><button type='text'>Deletar</button></a></td>";
}
echo "</tr>";
} 

// Fecha tabela 
echo "</table>\n"; 
} 
else 
{ 
echo "<B>Nenhuma notícia cadastrada!</B>\n"; 
} 

/*if(isset($_POST['enviar'])){
    $MySQLiconn->query('UPDATE noticias SET titulo="'.$_POST['titulo'].'", par1="'.$_POST['par1'].'", img1="'.$_POST['img1'].'", par2="'.$_POST['par2'].'", img2="'.$_POST['img2'].'", par3="'.$_POST['par3'].'", img3="'.$_POST['img3'].'", par4="'.$_POST['par4'].'", img4="'.$_POST['img4'].'" WHERE id='.$_POST['id_noticia']);
    header("Refresh:0");
}*/


?>