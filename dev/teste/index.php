<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script type='text/javascript'>

    $(document).ready(function() {
	 $('body').on('click', '.add-lanche', function(){
	     var id = '23'
         $.getJSON('mais.php', {id: id}, function(data) {
		 if(data.age == '1'){
			$('#tamanhos').attr("data-setamanhos", "sim");
			}
        });
		});
    }); 
    </script>
</head>



<body>
<div class="add-lanche">ADD</div>
<div id="tamanhos"></div>
</body>
</html>
