<?php 
require "verifica.php";
// Conexão com o banco de dados 
require "comum.php"; 

// Imprime mensagem de boas vindas 
echo "<font face=\"Verdana\" size=2>Bem-Vindo " .$_SESSION["nome"] . "!<BR>\n"; 

// Verifica e imprime quantidade de notícias no nome do usuário 
//$SQL = "SELECT id FROM aut_noticias WHERE aut_usuario_id = " . $_SESSION["id_usuario"]; 
//$result_id = mysql_query($SQL) or die(mysql_error()); 
//$total = mysql_num_rows($result_id); 

$res = $MySQLiconn->query("SELECT idnoticia FROM noticias WHERE original_poster = " .$_SESSION['idusuario']);
$total=$res->fetch_array();

$tot= count($total);

if(count($total)) 
{ 
echo "Há um total de ".$tot." notícia(s) de sua autoria!\n"; 
} 
else 
{ 
echo "Não há nenhuma notícia de sua autoria!\n"; 
}

/** 
* Verifica se usuário tem permissão para postar novas notícias. 
* Caso positivo, imprime link para postagem de notícias 
*/ 
/*if($_SESSION["permissao"] == "S")*/ 
{ 
echo " | <a href=\"nova.php\">Postar nova notícia</a>\n"; 
} 

// Imprime link de logout 
echo " | <a href=\"sair.php\">Sair do Sistema</a>"; 

echo "<br><br>\n"; 

/** 
* Imprime as notícias 
*/ 
$SQL = "SELECT idnoticia, titulo, par1, img1 FROM noticias ORDER BY titulo DESC"; 
//$result_id = mysql_query($SQL) or die(mysql_error()); 
//$total = mysql_num_rows($result_id); 

$res = $MySQLiconn->query($SQL);


if($total) 
{ 
// Abre tabela HTML 
echo "<table border=1 cellpadding=3 cellspacing=0>\n"; 
echo "<tr><th>id noticia</th><th>title</th><th>content</th><th>op</th></tr>\n"; 


// Efetua o loop no banco de dados 
while($dados=$res->fetch_array())
//while($dados = mysql_fetch_array($result_id)) 
{ 

echo "<tr><td>" . $dados["idnoticia"] . "</td><td>";
echo "<a href=ver_noticia.php?id=".$dados["idnoticia"]. "\>" . stripslashes($dados["titulo"]);
echo "</a></td>"; 
echo "<td>" .  $dados["par1"] . "</td></tr>\n"; 
} 

// Fecha tabela 
echo "</table>\n"; 
} 
else 
{ 
echo "<B>Nenhuma notícia cadastrada!</B>\n"; 
} 
?>