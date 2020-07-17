<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>


  <script type="text/javascript">
   $(function($) {

	    $("#enviar").click(function() {

		var files = $(".chosen-select-no-results").val();;
		
        alert("Categoria:" +files);

   });
   });

</script>
  <link rel="stylesheet" href="docsupport/prism.css">
  <link rel="stylesheet" href="chosen.css">

  
</head>

<body>
<form id="form" name="form" method="post" action="" onsubmit="return validar(this);">

 <select name="categoria" id="categoria" data-placeholder="Type 'C' to view" style="width:350px;" multiple class="chosen-select-no-results" tabindex="11">
            <option value=""></option>
            <option>American Black Bear</option>
            <option>Asiatic Black Bear</option>
            <option>Brown Bear</option>
            <option>Giant Panda</option>
            <option>Sloth Bear</option>
            <option>Sun Bear</option>
            <option>Polar Bear</option>
            <option>Spectacled Bear</option>
          </select>
          <div style="padding-top:10px; padding-bottom:10px; background-color: #31806A; color: #FFFFFF; font-weight: bold; border: 1px solid #266252; width: 170px; text-align: center; cursor: pointer; float: left;" id="enviar">Enviar</div>              
          </form>
           <script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  
  <script>
  $(".chosen-select-no-results").chosen({max_selected_options: 2});
  </script>
</body>
</html>
