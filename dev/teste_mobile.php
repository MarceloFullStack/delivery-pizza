<script>
        var settim = setInterval(function(){
            //if(screen.width <= 768 || document.getElementById('newBody').offsetWidth <= 768){
            var offsewidt = 0;
            try{
                offsewidt = document.getElementById('newBody').offsetWidth;
            }catch(ewwe){ offsewidt = 0; }
            if( (offsewidt > 0 && offsewidt <= 768) || (screen.width <= 768) ){
                document.location = "http://mobiledemo.expressodelivery.net/?dvc=mobile";
                clearInterval(settim);
            }
        },200);
        //if (screen.width <= 768) { document.location = "http://mobiledemo1.expressodelivery.com.br/?dvc=mobile"; }
    </script>



<div id="newBody" style="position: fixed; top:0; left: 0; width: 100%"></div>
