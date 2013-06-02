<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>

        <title>Read the Feed</title>


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

        <style type="text/css">
            body {
                background: transparent url(images/greybg.jpg);
                background-repeat:no-repeat;
                background-size:2000px 2000px;
                background-position:center;
                overflow:visible;
            }
            .metro {
                width: 1000px;
                overflow: hidden;
            }
            .metro-section {
                width: 810px !important;
            }
            #section1 {
            }
            #section2 {

            }
            #section3 {
                width: 320px !important;
            }
            .metro-sections {
                width: 10000px !important;
            }
            .start {
                position: absolute;
                top: 60px;
            }
            #demo {
            }
        </style>
    </head>
    <body>

        <?php include("header.html");
        ?>


        <?php
        $htmlData = "";
        $title = array();
        $image = array();
        $description = "";


        if (isset($_POST['url']) || isset($_GET['url'])) {
            if (isset($_POST["url"])) {
                $url = $_POST["url"];
            } else {
                $url = $_GET["url"];
            }

            require_once("class.Rss.php");
            $rssObj = new Rss();
            $GLOBALS['valid'] = $rssObj->validateFeed($url);
            $_SESSION['valid'] = json_encode($GLOBALS['valid']);
            if ($valid == true) {
                $whole = $rssObj->readFeed($url);

                $GLOBALS['htmlData'] = $whole[0];

                $GLOBALS['title'] = $whole[1];

                $GLOBALS['image'] = $whole[2];

                $GLOBALS['description'] = $whole[3];

                $GLOBALS['link'] = $whole[4];
                $size = sizeof($GLOBALS['title']);
                for ($i = 0; $i < $size; $i++) {
                   
				   $GLOBALS['title'][$i]=utf8_encode($GLOBALS['title'][$i]);
                     
                }
				 
                $_SESSION['htmlData'] = json_encode($GLOBALS['htmlData']);
                $_SESSION['title'] = json_encode($GLOBALS['title']);
			
                $_SESSION['image'] = json_encode($GLOBALS['image']);
                $_SESSION['description'] = json_encode($GLOBALS['description']);
                $_SESSION['link'] = json_encode($GLOBALS['link']);
                ?>

                <!-- body of elements -->
                <div class="container" id="containerDiv" style="position:relative;right:300px;">
                    <div  class="metro">
                        <div class="metro-sections">
                            <div class="metro-section" id="section1">

                                <a data-next="#section2" data-prior="#section1" href="#" class="next-section"></a>						 
                                <?php
                                $size = sizeof($title);
                                for ($i = 0; $i < $size; $i++) {
                                   if($i%2==0)
								   {
                                    echo '<div class="tile tile-quadro tile-multi-content bg-color-blue ">
                            <div class="tile-content-main">
                                <div style="padding: 10px;">
                                 
                                    <img src="' . $image[$i] . '" style="height:100px;width:100px;margin-top:35px;margin-right: 20px" class="place-left" />
                           
                                         <div style="margin-left: 115px; margin-top: 10px">
                                        <p style="font-size: 20px; margin-top: 0px;"></p>
                                     
                                        <p style="font-size: 20px; margin-top: 50px">' . $title[$i] . '</p>
										 <p style="font-size: 18px; margin-top: 0px;"></p>
                                    </div>
                                </div>
                                <span class="tile-label"></span>
                            </div>
                            <div style="font-size:8pt;" class="tile-content-sub bg-color-blueDark ">' . $description[$i] . '
                            </div></div>';
                                }
								else
								{
								echo '<div class="tile tile-quadro tile-multi-content bg-color-red ">
                            <div class="tile-content-main">
                                <div style="padding: 10px;">
                                 
                                    <img src="' . $image[$i] . '" style="height:100px;width:100px;margin-top:35px;margin-right: 20px" class="place-left" />
                           
                                         <div style="margin-left: 115px; margin-top: 10px">
                                        <p style="font-size: 20px; margin-top: 0px;"></p>
                                     
                                        <p style="font-size: 20px; margin-top: 50px">' . $title[$i] . '</p>
										 <p style="font-size: 18px; margin-top: 0px;"></p>
                                    </div>
                                </div>
                                <span class="tile-label"></span>
                            </div>
                            <div style="font-size:10pt;" class="tile-content-sub bg-color-orange ">' . $description[$i] . '
                            </div></div>';	
																			
								}
								}
                                ?>

                            </div>
                        </div>
                    </div>
                </div>	   
                <?php
            } else {
                ?>      
                <div class="span7">
                    <div class="metro-reply bg-color-red" style="position:fixed;right:500px;top:200px;">

                        <table>
                            <tr>
                                <td>
                                    <div class="avatar"><img src="images/Security Denied.png" style="height:100px;width:100px;" /></div></td>
                                <td> <div class="reply">

                                        <div class="text" style="font-size:20px ;"><b>You entered an invalid URL.Please Enter a Valid URL.</b></div>                       
                                    </div>
                                </td></tr><a href="#" class="close"></a>
								 
                        </table>
                    </div>
                </div>



                <?php
            }
        } else if (!empty($_SESSION['title']) || isset($_SESSION['title'])) {
            ?>

            <div class="container" id="containerDiv" style="position:fixed;right:300px;">
                <div  class="metro">
                    <div class="metro-sections">
                        <div class="metro-section" id="section1">

                            <a data-next="#section2" data-prior="#section1" href="#" class="next-section"></a>
                            <?php
                            $title = json_decode($_SESSION['title']);
                            $image = json_decode($_SESSION['image']);
                            $htmlData = json_decode($_SESSION['htmlData']);
                            $desc = json_decode($_SESSION['description']);
                            $size = sizeof($title);
                            for ($i = 0; $i < $size; $i++) {
                              if($i%2==0){
                                echo '<div class="tile tile-quadro tile-multi-content bg-color-blue ">
                            <div class="tile-content-main">
                                <div style="padding: 10px;">
                                 
                                    <img src="' . $image[$i] . '" style="height:100px;width:100px;margin-top:35px;margin-right: 20px" class="place-left" />
                           
                                         <div style="margin-left: 115px; margin-top: 10px">
                                        <p style="font-size: 20px; margin-top: 0px;"></p>
                                        <p style="font-size: 18px; margin-top: 0px;"></p>
                                        <p style="font-size: 20px; margin-top: 50px">' . $title[$i] . '</p>
                                    </div>
                                </div>
                                <span class="tile-label"></span>
                            </div>
                            <div style="font-size:8pt;" class="tile-content-sub bg-color-blueDark ">' . $desc[$i] . '</div></div>';
                            }
							else{
							 echo '<div class="tile tile-quadro tile-multi-content bg-color-red ">
                            <div class="tile-content-main">
                                <div style="padding: 10px;">
                                 
                                    <img src="' . $image[$i] . '" style="height:100px;width:100px;margin-top:35px;margin-right: 20px" class="place-left" />
                           
                                         <div style="margin-left: 115px; margin-top: 10px">
                                        <p style="font-size: 20px; margin-top: 0px;"></p>
                                        <p style="font-size: 18px; margin-top: 0px;"></p>
                                        <p style="font-size: 20px; margin-top: 50px">' . $title[$i] . '</p>
                                    </div>
                                </div>
                                <span class="tile-label"></span>
                            </div>
                            <div style="font-size:10pt;" class="tile-content-sub bg-color-orange ">' . $desc[$i] . '</div></div>';
							
							
							}
							}
                            ?>

                        </div>
                    </div>
                </div>
            </div> 
        <?php }
        ?>


        <?php
        $valid = json_decode($_SESSION['valid']);
        if ($valid == true) {
            ?>
            <a href="slideshow.php">
                <div class="tile-vertical bg-color-yellow " style="height:200px;width:200px;position:fixed;right:30px;top:300px">
                    <div class="tile-icon-large" style="width:100px;position:fixed;right:80px;top:350px;">
                        <img src="images/slideshow.jpg" />
                    </div>
                    <span class="tile-label" style="position:fixed;top:460px;right:65px;color:black;font-size:27px;"><b>Slide Show</b></span>
                </div></a>
        <?php } ?>

         <div id="footer" style="position:relative;"> 
       <?php include("footer.html"); ?>
        </div>
        <script type="text/javascript">
            $(function(){
                window.prettyPrint && prettyPrint();
            })

            $(".metro").metro();

        </script>
    </body>
</html>