<!--Detailed information of goods-->

<?php include("templates/temp_head.php")?>
<?//php include("templates/temp_body_header.php")?>
<?php include("detail_data.php")?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <section class="rw-wrapper">

        </section>
    </div>
</div>

<br>
<a href="javascript:history.go(-1)">
    <button>《〈《〈BACK TO PREVIOUS PAGE</button>
</a>

<!--//banner-->

<div class="single">

<div class="container">
<div class="col-md-9">
	<div class="col-md-5 grid">		
		<div class="flexslider">
			  <ul class="slides">
              <?php echo "$goods_picture" ?>
			  </ul>
		</div>
	</div>	
<div class="col-md-7 single-top-in">
        <div class="span_2_of_a1 simpleCart_shelfItem">
            <?php echo "$goods_information" ?>
        <div class="clearfix"> </div>
    </div>
    
</div>
