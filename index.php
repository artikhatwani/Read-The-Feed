<!DOCTYPE html>
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

        <!-- Nav bar starts here-->
      <?php include("header.html"); ?>

        <!-- Nav bar ends here-->
     
               
       <div id="footer" style="position:relative;top:720px;"> 
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