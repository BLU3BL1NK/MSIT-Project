<?php
include '../Administrator/connection/connection.php';
session_start();

$ClientName = $_SESSION['ClientName'];
if(empty($_SESSION['ClientName'])){
header('location:../index.php');
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Decent Touch Massage</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="../Administrator/css/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="../Administrator/css/style.responsive.css" media="all">
    <link href='../Administrator/images/logo.ico' type='image' rel='icon'>
    <link rel="stylesheet" type="text/css" href="../Administrator/engine1/style.css" />
    <script type="text/javascript" src="../Administrator/engine1/jquery.js"></script>
    <script src="../Administrator/js/jquery.js"></script>
    <script src="../Administrator/js/script.js"></script>
    <script src="../Administrator/js/script.responsive.js"></script>
    <link rel="stylesheet" href="../Administrator/css/loginstyle.css">
<meta name="description" content="Description">
<meta name="keywords" content="Keywords">



<style>.art-content .art-postcontent-0 .layout-item-0 { margin-top: 0px;margin-right: 0px;margin-bottom: 10px;margin-left: 0px;  }
.art-content .art-postcontent-0 .layout-item-1 { border-top-width:1px;border-top-style:Solid;border-top-color:#D9D9D9;  }
.art-content .art-postcontent-0 .layout-item-2 { color: #0C1301; background: ;  }
.art-content .art-postcontent-0 .layout-item-3 { margin-top: 10px;margin-bottom: 10px;  }
.art-content .art-postcontent-0 .layout-item-4 { border-top-style:solid;border-right-style:Solid;border-bottom-style:solid;border-left-style:solid;border-top-width:0px;border-right-width:1px;border-bottom-width:0px;border-left-width:0px;border-color:#D9D9D9; padding-top: 20px;padding-right: 20px;padding-bottom: 0px;padding-left: 0px;  }
.art-content .art-postcontent-0 .layout-item-5 { padding: 20px;  }
.art-content .art-postcontent-0 .layout-item-6 { color: #0C1301; background: #FF962E;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>
<div id="art-main">
<header class="art-header">

    <div class="art-shapes">
        <div class="art-object260662843"></div>
<div class="art-object1659420484"></div>
<div class="art-object2006801486"></div>

            </div>           
</header>
<nav class="art-nav">
    <ul class="art-hmenu">
        <?php
            include '../Administrator/includes/Register/Home.html'
        ?>
    </ul> 
    </nav>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1"><div class="art-block clearfix">
                            <p>Welcome <span style="font-weight: bold;"><?php echo $ClientName?>!</span></p>
 <br>

<div class="art-blockcontent">
<input type='button' class='art-button' value='LATEST NEWS' disable style='width:90%'><br><br>
<script type="text/javascript">
//specify path to your external page:
var iframesrc="../Administrator/includes/external.php"

//You may change most attributes of iframe tag below, such as width and height:
document.write('<iframe id="datamain" src="'+iframesrc+'" width="100%" height="650px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>')

</script>
</div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-2" style="width: 100%" >
        <!-- Start WOWSlider.com BODY section -->
    <div id="wowslider-container1">
    <div class="ws_images"><ul>
    <li><img src="../Administrator/data1/images/clean_massage_room.jpg" alt="Clean Massage Room" title="Clean Massage Room" id="wows1_0"/></li>
    <li><img src="../Administrator/data1/images/couple_massage__room.jpg" alt="Couple Massage  Room" title="Couple Massage  Room" id="wows1_1"/></li>
    <li><img src="../Administrator/data1/images/couple_massage_room.jpg" alt="Couple Massage Room" title="Couple Massage Room" id="wows1_2"/></li>
    <li><img src="../Administrator/data1/images/cubicle_room.jpg" alt="Cubicle Room" title="Cubicle Room" id="wows1_3"/></li>
    <li><img src="../Administrator/data1/images/relaxing_ambiance.jpg" alt="Relaxing Ambiance" title="Relaxing Ambiance" id="wows1_4"/></li>
    </ul></div>
    <div class="ws_bullets"><div>
    <a href="#" title="Clean Massage Room"><img src="../Administrator/data1/tooltips/clean_massage_room.jpg" alt="Clean Massage Room"/>1</a>
    <a href="#" title="Couple Massage  Room"><img src="../Administrator/data1/tooltips/couple_massage__room.jpg" alt="Couple Massage  Room"/>2</a>
    <a href="#" title="Couple Massage Room"><img src="../Administrator/data1/tooltips/couple_massage_room.jpg" alt="Couple Massage Room"/>3</a>
    <a href="#" title="Cubicle Room"><img src="../Administrator/data1/tooltips/cubicle_room.jpg" alt="Cubicle Room"/>4</a>
    <a href="#" title="Relaxing Ambiance"><img src="../Administrator/data1/tooltips/relaxing_ambiance.jpg" alt="Relaxing Ambiance"/>5</a>
    </div></div>
    <span class="wsl"><a href="http://wowslider.com">Javascript Photo Slideshow</a> by WOWSlider.com v4.8</span>
        <div class="ws_shadow"></div>
        </div>
        <script type="text/javascript" src="../Administrator/engine1/wowslider.js"></script>
        <script type="text/javascript" src="../Administrator/engine1/script.js"></script>
        <!-- End WOWSlider.com BODY section -->
    </div>
    </div>
</div>
</div><br><br><br>
<div class="art-content-layout-br layout-item-1">
</div><div class="art-content-layout-wrapper layout-item-3">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-4" style="width: 100%" >
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.906570039177!2d123.43599911081193!3d7.832639820079638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32541806e1cf9e1d%3A0x6ee76be12ffacb97!2sP+Sabate+St%2C+Pagadian+City%2C+Zamboanga+del+Sur!5e0!3m2!1sen!2sph!4v1483844081039" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </div>
</div>
</div>
<div class="art-content-layout-br layout-item-1">
</div><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%" >
        <p>More often that not, we need to take a break once in a while from the dull repetitive lifestyle we have because when you get excessively pushed from your day by day tedious way of life and long lines, you'd most likely be too stressed before you know it. Recover your inside and anticipate the tranquility that is standing by. Make a stop at Decent Touch Massage Center where you can browse various back rubs like Whole Body Massage, Foot and Leg Massage and so on, all promising beneficial and relaxing effects. No need to worry about rushing through it and never feeling relaxed at all; Decent Touch Massage Center offers 20-minute massages for those who only have time for a snappy rub. Life is beautiful and a massage is a surefire approach to restart another beginning;feeling relaxed and gathered.</p>
    </div>
    </div>
</div>
</div>
                                
                

</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 50%">
        <p style="text-align: left;"><a href='https://twitter.com/'><img width="38" height="38" alt="" src="../Administrator/images/1308293091_twitter-2.png" style="margin-top: 0px; margin-right: 5px; margin-bottom: 0px; margin-left: 0px;" class=""></a><a href='https://www.facebook.com/'><img width="38" height="38" alt="" src="../Administrator/images/1308293119_facebook-2.png" style="margin-top: 0px; margin-right: 5px; margin-bottom: 0px; margin-left: 0px;" class=""></a></p>
    </div><div class="art-layout-cell layout-item-0" style="width: 50%">
        <p style="text-align: right;">Copyright © 2017 <a href="#">Privacy Policy</a><br>
         <a href="http://www.iconfinder.com/search/?q=iconset:WPZOOM_Social_Networking_Icon_Set"></a></p>
    </div>
    </div>
</div>

    <p class="art-page-footer">
        <span id="art-footnote-links"></span>
    </p>
</footer>

    </div>
</div>


</body></html>