<!DOCTYPE html>
<html >

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="https://production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
  <link rel="mask-icon" type="" href="https://production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
  <title>CodePen - jQuery. Fly to cart effect. </title>

      <style>

h2 {
    font-size: 16px;
    display: block;
    border-bottom: 1px solid #ccc;
    margin: 0 0 10px 0;
    padding: 0 0 5px 0;
}
button {
    border: 1px solid #722A1B;
    padding: 4px 14px;
    background-color: #fff;
    color: #722A1B;
    text-transform: uppercase;
    float: right;
    margin: 5px 0;
    font-weight: bold;
    cursor: pointer;
}
span {
    float: right;
}
.shopping-cart {
    display: inline-block;
    background: url('http://cdn1.iconfinder.com/data/icons/jigsoar-icons/24/_cart.png') no-repeat 0 0;
    width: 24px;
    height: 24px;
    margin: 0 10px 0 0;
}
    </style>


</head>

<body>

  <!-- wrapper -->
<div class="wrapper">
 <?php include('cabecalho.php'); ?>
 <span><i class="shopping-cart"></i></span>

    <div class="clear"></div>
    <!-- items -->
    <div class="items">
        <!-- single item -->
        <div class="item">
            <img src="http://img.tjskl.org.cn/pic/z2577d9d-200x200-1/pinarello_lungavita_2010_single_speed_bike.jpg" alt="item" />
             <h2>Item 1</h2>

            <p>Price: <em>$449</em>
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
        </div>
        <!--/ single item -->
        <!-- single item -->
        <div class="item">
            <img src="http://img.tjskl.org.cn/pic/z2577d9d-200x200-1/pinarello_lungavita_2010_single_speed_bike.jpg" alt="item" />
             <h2>Item 1</h2>

            <p>Price: <em>$449</em>
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
        </div>
        <!--/ single item -->
        <!-- single item -->
        <div class="item">
            <img src="http://img1.exportersindia.com/product_images/bc-small/dir_55/1620613/cannondale-jekyll-1-2011-mountain-bike-309779.jpg" alt="item" />
             <h2>Item 1</h2>

            <p>Price: <em>$449</em>
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
        </div>
        <!--/ single item -->
    </div>
    <!--/ items -->
</div>
<!--/ wrapper -->


  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

    <script >
    /*
	Add to cart fly effect with jQuery. - May 05, 2013
	(c) 2013 @ElmahdiMahmoud - fikra-masri.by
	license: https://www.opensource.org/licenses/mit-license.php
*/   

$('.add-to-cart').on('click', function () {
        var cart = $('.shopping-cart');
        var imgtodrag = $(this).parent('.item').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
  //# sourceURL=pen.js
  </script>

  
  

</body>
</html>
 