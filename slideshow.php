<html> 
    <script type='text/javascript' src='js/jquery.js'></script>
    <?php
    session_start();

    $title = json_decode($_SESSION['title']);
	for($i=0;$i<sizeof($title);$i++)
	{
		$title[$i]=utf8_decode($title[$i]);
	}
  
    $image = json_decode($_SESSION['image']);
    $htmlData = json_decode($_SESSION['htmlData']);
    ?>
    <div id="Slider">
        <!DOCTYPE html>
        <head> 
            <!-- for metro ui-->
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
            <link rel="stylesheet" type="text/css" href="css/prettify.css">
            <link rel="stylesheet" type="text/css" href="css/metro.css">
            <link rel="stylesheet" type="text/css" href="css/site.css">

            <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
            <script type="text/javascript" src="js/jquery.transit.js"></script>
            <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
            <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/prettify.js"></script>
            <script type="text/javascript" src="js/metro.js"></script>
            <script type="text/javascript" src="js/site.js"></script>
            <script type="text/javascript" src="js/google-analytics.js"></script>     

            <!-- for metro ui-->

            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" > 
            <title>Rss Feed Reader</title> 
            <!--///////////////////////////////////////////////////////////////////////////////////////////////////
            //
            //		Styles
            //
            ///////////////////////////////////////////////////////////////////////////////////////////////////--> 
            <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'> 

            <style>
                body {
                    background: transparent url(images/greybg.jpg);
                    background-repeat:no-repeat;
                    background-size:2000px 2000px;
                    background-position:center;
                    scroll:visible;
                    margin: 0;
                    padding: 0;
                }
                #back_to_camera {

                    clear: both;
                    display: block;
                    height: 80px;
                    line-height: 40px;
                    padding: 20px;
                }
                .fluid_container {
                    margin: 0 auto;
                    max-width: 1000px;
                    width: 90%;
                }
            </style>

            <!--///////////////////////////////////////////////////////////////////////////////////////////////////
            //
            //		Scripts
            //
            ///////////////////////////////////////////////////////////////////////////////////////////////////--> 

            <script type='text/javascript' src='js/jquery.min.js'></script>
            <script type='text/javascript' src='js/jquery.mobile.customized.min.js'></script>
            <script type='text/javascript' src='js/jquery.easing.1.3.js'></script> 
            <script type='text/javascript' src='js/camera.min.js'></script> 

  <?php include("header.html");
        ?>
            <script>
              
                jQuery(function(){
			 
                    jQuery('#camera_random').camera({
						height: "50%",
                        thumbnails: false,
                        fx: 'simpleFade',
                        hover:false
                    });
           
                });
			
            </script>


        </head>
        <!-- download tile-->
        <div id="download" >
            <a href="generatePDF.php" style="position:fixed;right:660px;top:670px;">
                <div class="tile tile-vertical bg-color-darken" style="height:100px;width:250px;position:fixed;right:500px;top:650px">
                    <div class="tile-icon-large" style="height:130px;width:70px;position:fixed;right:660px;top:670px;">
                        <img src="images/pdf.jpg" />
                    </div>
                    <span class="tile-label" style="position:fixed;top:680px;right:530px;font-size:25px;color:black;"><b>Download</b></span>
                </div>   
            </a>

        </div>
        <!-- download tile ends-->
        <!-- back tile starts-->
        <a href="FeedsList.php">
            <div class="tile bg-color-purple" style="height:100px;width:250px;position:fixed;right:800px;top:650px">
                <div class="tile-icon-large"  style="width:150px;position:fixed;right:850px;top:660px;">
                    <img src="images/goback.jpg" />
                </div>
                <span class="tile-label" style="font-size:20pt;position:fixed;top:630px;right:850px;"></span>
            </div>

        </a>  


        <!-- back tile ends-->
        <div id="slideshow" class="fluid_container" style="position:relative;">
            <div class="camera_wrap camera_black_skin" id="camera_random">
                <?php
                $size = sizeof($title);
                for ($i = 0; $i < $size; $i++) {
                    echo '<div class="cameraSlide topToBottom" data-src="' . $image[$i] . '">
			<div class="camera_caption moveFromLeft">
                    ' . $title[$i] . '<em> </em>
                </div>
              </div>';
                }
                ?>
            </div><!-- #camera_random -->
        </div><!-- .fluid_container -->
        <div style="clear:both; display:block; height:100px"></div>	
    </div><!-- #Slider -->
 <div id="footer" style="position:relative;"> 
       <?php include("footer.html"); ?>
        </div>
</html>