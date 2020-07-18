<?php 
include('bd.php');
error_reporting(0);

function countRec($fname,$tname,$where) {
$sql = "SELECT count($fname) FROM $tname $where";
$result = runSQL($sql);
while ($row = mysqli_fetch_array($result)) {
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
			$where = "WHERE `".$_POST['qtype']."` LIKE '%".$_POST['query']."%'";
		} else {
			$where ="";
		}
		if($_POST['letter_pressed']!=''){
			$where = "WHERE `".$_POST['qtype']."` LIKE '".$_POST['letter_pressed']."%'";	
		}
		if($_POST['letter_pressed']=='#'){
			$where = "WHERE `".$_POST['qtype']."` REGEXP '[[:digit:]]'";
		}
$sort = "ORDER BY $sortname $sortorder";

if (!$page) $page = 1;
if (!$rp) $rp = 10;

$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$sql = "SELECT * FROM usuarios $where $sort $limit";
$result = runSQL($sql);

$total = countRec('id_u','usuarios',$where);

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
while ($row = mysqli_fetch_array($result)) {

if ($rc) $json .= ",";
$json .= "\n{";
$json .= "id:'".$row['id_u']."',";
$json .= "cell:['".$row['id_u']."'";
$json .= ",'".addslashes($row['nome'])."'";
$json .= ",'".addslashes($row['email'])."'";
$json .= ",'".addslashes($row['telefone'])."'";
$json .= ",'".addslashes($row['celular'])."'";
$json .= ",'".addslashes($row['data'])."'";
$json .= ",'<img src=mais.png />'";
$json .= ",'<img src=lixeira.png />']";
$json .= "}";
$rc = true;
}
$json .= "]\n";
$json .= "}";
echo $json;
?>