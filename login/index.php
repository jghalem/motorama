<?php 
// Verificador de sessão /* tudo oque for id_usuario renomeie para apenas "id"*/
require "verifica.php"; 

// Conexão com o banco de dados 
require "comum.php"; 

// Imprime mensagem de boas vindas 
echo '<body bgcolor="#e6e6e6">';
echo "<font face=\"Verdana\" size=2>Bem Vindo, " . ucfirst($_SESSION["nome"]) . "!<BR>\n"; 

// Verifica e imprime quantidade de notícias no nome do usuário 
//$SQL = "SELECT id FROM aut_noticias WHERE aut_usuario_id = " . $_SESSION["id_usuario"]; 
//$result_id = mysql_query($SQL) or die(mysql_error()); 
//$total = mysql_num_rows($result_id); 

/**
* Verifica se o usuário é um administrador
* Caso positivo, mostra as notícias de todos os usuários.
* Caso negativo, mostra as próprias notícias.
*/


$res = $MySQLiconn->query("SELECT id_noticia FROM noticias WHERE original_poster = " .$_SESSION['id_usuario']);

$tot = 0;

//$total=$res->fetch_array();
//$tot= count($total);

while ($local = $res->fetch_array()) {
$tot++;
}

if(isset($tot))
{ 
echo "Há um total de {$tot} notícia(s) de sua autoria!\n";
} 
else 
{ 
echo "Não há nenhuma notícia de sua autoria!\n"; 
} 

/** 
* Verifica se usuário tem permissão para postar novas notícias. 
* Caso positivo, imprime link para postagem de notícias 
*/ 

echo " | <a href=\"crud/noticias/create.php\">Postar nova notícia</a>\n"; 


// Imprime link de logout 
echo " | <a href=\"sair.php\">Sair do Sistema</a>"; 

echo "<br><br>\n"; 

/** 
* Imprime as notícias de determinado usuario 
*/ 

$SQL = "SELECT id_noticia, titulo, par1, img1, par2, img2, par3, img3, par4, img4, data FROM noticias ORDER BY data DESC";



/*$SQL = "SELECT id, titulo, data FROM aut_noticias WHERE aut_usuario_id = {$_SESSION['id_usuario']} ORDER BY data DESC";*/


//$result_id = mysql_query($SQL) or die(mysql_error()); 
//$total = mysql_num_rows($result_id); 

$result = $MySQLiconn->query($SQL);

if($result->num_rows <> 0) 
{ 
// Abre tabela HTML 
echo "<table border=1 cellpadding=3 cellspacing=0>\n";

echo "<tr><th>Id</th><th>Título</th><th>Par1</th><th>img1</th><th>par2</th><th>img2</th><th>par3</th><th>img3</th><th>par4</th><th>img4</th><th>opções</th></tr>\n"; 


// Efetua o loop no banco de dados 
while($dados=$result->fetch_array())
//while($dados = mysql_fetch_array($result_id)) 
{ 
echo "<tr><td>" . $dados["id_noticia"] . "</td><td>";
echo "<a href=ver_noticia.php?id=".$dados["id_noticia"]. ">" . stripslashes($dados["titulo"]);
echo "</a></td>"; 

echo "<td>" .  $dados["par1"] . "</td>\n";
echo "<td><img src=' " .  $dados["img1"] . "'></td>\n";
echo "<td>" .  $dados["par2"] . "</td>\n";
echo "<td><img src=' " .  $dados["img2"] . "'></td>\n";
echo "<td>" .  $dados["par3"] . "</td>\n";
echo "<td><img src=' " .  $dados["img3"] . "'></td>\n";
echo "<td>" .  $dados["par4"] . "</td>\n";
echo "<td><img src=' " .  $dados["img4"] . "'></td>\n";
echo "<td><a href='crud/noticias/edit.php?id=".$dados['id_noticia']."'>Editar</a>";
echo " | <a href='crud/noticias/remove.php?id=".$dados['id_noticia']."'>Deletar</a></td></tr>";

} 

// Fecha tabela 
echo "</table>\n"; 
} 
else 
{ 
echo "<B>Nenhuma notícia cadastrada!</B>\n"; 
} 

if(isset($_POST['enviar'])){
    $MySQLiconn->query('UPDATE noticias SET titulo="'.$_POST['titulo'].'", conteudo="'.$_POST['conteudo'].'" WHERE id='.$_POST['id_noticia']);
    header("Refresh:0");
}


?>