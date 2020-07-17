<?php 
error_reporting(0);

include('bd.php');

function countRec($fname,$tname,$where) {
$sql = "SELECT count($fname) FROM $tname $where";
$result = runSQL($sql);
while ($row = mysql_fetch_array($result)) {
return $row[0];
}
}
$page = $_POST['page'];
$rp = $_POST['rp'];
$sortname = $_POST['sortname'];
$sortorder = $_POST['sortorder'];

if (!$sortname) $sortname = 'nome';
if (!$sortorder) $sortorder = 'desc';
		if($_POST['query']!=''){
			$where = "WHERE categoria='pizzas' and `".$_POST['qtype']."` LIKE '%".$_POST['query']."%'";
		} else {
			$where ="WHERE categoria='pizzas'";
		}
		if($_POST['letter_pressed']!=''){
			$where = "WHERE categoria='pizzas' and`".$_POST['qtype']."` LIKE '".$_POST['letter_pressed']."%'";	
		}
		if($_POST['letter_pressed']=='#'){
			$where = "WHERE categoria='pizzas' and `".$_POST['qtype']."` REGEXP '[[:digit:]]'";
		}
$sort = "ORDER BY $sortname $sortorder";

if (!$page) $page = 1;
if (!$rp) $rp = 10;

$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$sql = "SELECT * FROM produtos $where $sort $limit";
$result = runSQL($sql);

$total = countRec('id','produtos',$where);

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/x-json");
$json = "";
$json .= "{\n";
$json .= "page: $page,\n";
$json .= "total: $total,\n";
$json .= "rows: [";
$rc = false;
while ($row = mysql_fetch_array($result)) {

if($row['categoria']=='pizzas'){
$nome = ''.$row['tamanho'].' '.$row['sabor'].'';
}else{
$nome = $row['nome'];
}

if ($rc) $json .= ",";
$json .= "\n{";
$json .= "id:'".$row['id']."',";
$json .= "cell:['".$row['id']."'";
$json .= ",'".addslashes($nome)."'";
$json .= ",'R$ ".addslashes($row['valor'])."'";
$json .= ",'".addslashes($row['categoria'])."'";
$json .= ",'<img src=editar.png />'";
$json .= ",'<img src=lixeira.png />']";
$json .= "}";
$rc = true;
}
$json .= "]\n";
$json .= "}";
echo $json;
?>