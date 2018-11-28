<?php 
// Verificador de sessão /* tudo oque for id_usuario renomeie para apenas "id"*/
require "verifica.php"; 

// Conexão com o banco de dados 
require "comum.php"; 

// Imprime mensagem de boas vindas 
echo '<body bgcolor="#e6e6e6">';
echo "<font face=\"Verdana\" size=2>Bem Vindo, " . ucfirst($_SESSION["nome_usuario"]) . "!<BR>\n"; 

// Verifica e imprime quantidade de notícias no nome do usuário 
//$SQL = "SELECT id FROM aut_noticias WHERE aut_usuario_id = " . $_SESSION["id_usuario"]; 
//$result_id = mysql_query($SQL) or die(mysql_error()); 
//$total = mysql_num_rows($result_id); 

/**
* Verifica se o usuário é um administrador
* Caso positivo, mostra as notícias de todos os usuários.
* Caso negativo, mostra as próprias notícias.
*/

if($_SESSION["admin"] !== true) 
{ 
$res = $MySQLiconn->query("SELECT id FROM aut_noticias WHERE aut_usuario_id = " .$_SESSION['id_usuario']);
}
else
{
$_SESSION["admin"] = true;
$res = $MySQLiconn->query("SELECT id FROM aut_noticias");
}
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
if($_SESSION["permissao"] == true) 
{ 
echo " | <a href=\"nova.php\">Postar nova notícia</a>\n"; 
}

// Imprime link de logout 
echo " | <a href=\"sair.php\">Sair do Sistema</a>"; 

echo "<br><br>\n"; 

/** 
* Imprime as notícias de determinado usuario 
*/ 
if ($_SESSION['admin'] == true) {
$SQL = "SELECT id, titulo, data FROM aut_noticias ORDER BY data DESC";
}
else
{
$SQL = "SELECT id, titulo, data FROM aut_noticias WHERE aut_usuario_id = {$_SESSION['id_usuario']} ORDER BY data DESC";
}

//$result_id = mysql_query($SQL) or die(mysql_error()); 
//$total = mysql_num_rows($result_id); 

$result = $MySQLiconn->query($SQL);

if($result->num_rows <> 0) 
{ 
// Abre tabela HTML 
echo "<table border=1 cellpadding=3 cellspacing=0>\n";
if($_SESSION['admin'] == true){
echo "<tr><th>Id</th><th>Título</th><th>Data</th><th>Opções</th></tr>\n"; 
}else{
    echo "<tr><th>Id</th><th>Título</th><th>Data</th></tr>\n"; 
}

// Efetua o loop no banco de dados 
while($dados=$result->fetch_array())
//while($dados = mysql_fetch_array($result_id)) 
{ 
echo "<tr><td>" . $dados["id"] . "</td><td>";
echo "<a href=ver_noticia.php?id=".$dados["id"]. ">" . stripslashes($dados["titulo"]);
echo "</a></td>"; 
if($_SESSION['admin'] == true){
echo "<td>" .  $dados["data"] . "</td>\n";
echo "<td><a href='?id=".$dados['id']."&action=edit' onclick=''>Editar</a>";
echo " | <a href='?id=".$dados['id']."&action=delete' onclick=''>Deletar</a></td></tr>";
}else{
    echo "<td>" .  $dados["data"] . "</td></tr>\n"; 
}
} 

// Fecha tabela 
echo "</table>\n"; 
} 
else 
{ 
echo "<B>Nenhuma notícia cadastrada!</B>\n"; 
} 

if(isset($_POST['enviar'])){
    $MySQLiconn->query('UPDATE aut_noticias SET titulo="'.$_POST['titulo'].'", conteudo="'.$_POST['conteudo'].'" WHERE id='.$_POST['id']);
    header("Refresh:0");
}

if(isset($_GET['action']) and $_SESSION["admin"] == true){
    if($_GET['action'] == 'delete'){
        $MySQLiconn->query("DELETE FROM aut_noticias WHERE id = " . $_GET['id']);
    }elseif($_GET['action'] == 'edit'){
        $resultado = $MySQLiconn->query('SELECT id,titulo,conteudo from aut_noticias where id ='.$_GET['id']);
        while($dados=$resultado->fetch_array()){
        echo '</br><form method="post" action="'.$_SERVER["PHP_SELF"].'">';
        echo '<h4>Editando noticia de ID: <b>'.$dados["id"].'</b> </h4>';
        echo '<label>Titulo: </label></br>';
        echo '<input type="text" name="titulo" value="'.$dados["titulo"].'"></br></br>';
        echo '<label>Conteudo: </label></br>';
        echo '<textarea rows="5" cols="40" name="conteudo">'.$dados["conteudo"].'</textarea></br>';
        echo '<input type="hidden" name="id" value="'.$dados["id"].'"></input><br>';
        echo '<input type="submit" name="enviar" value="Enviar"></br></form>';
    }   
    }
}

?>