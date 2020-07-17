<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="jquery-ui.js"></script>


 <script>
$(document).ready(function() {
var status_old    = '3';
var audio         = document.getElementById('audio');
var sources       = new EventSource("admin/alerta_pedidos.php");
sources.onmessage = function(e) {

alert('teste');
    audio.play();
	
	
	oldatas = e.data;
	
};
});	
</script> 

</head>

<body>
<audio id="audio"><source src="admin/campainha.mp3" type="audio/mp3" /></audio>      
</body>
</html>
