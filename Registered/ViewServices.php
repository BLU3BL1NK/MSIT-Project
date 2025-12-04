<?php
include '../Administrator/connection/connection.php';
session_start();

$ClientName = $_SESSION['ClientName'];
if(empty($_SESSION['ClientName'])){
header('location:../index.php');
}

$No = $_GET['No'];
$A = mysqli_query($cnn,"SELECT * FROM tblservices WHERE No='$No'");
$A1 = mysqli_fetch_array($A);

$_SESSION['MassageID'] = $No;
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
            include '../Administrator/includes/Register/Services.html'
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
    <div class="art-layout-cell layout-item-2" style="width: 100%" ><br>
        <center><font size=5><b>VIEW DETAILS</b></font></center><br>
        <center><table width=90%>
                <tr>
                    <td width=100% style='vertical-align:top' colspan=3>
                        <table width=100%>
                            <tr rowspan=2>
                                <td><img src='../Administrator/Massage/<?php echo $A1[4]?>' style='width:100%;height:300px'></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                     <td width=70% style='vertical-align:top'>
                        <table width=100%>
                            <tr>
                                <td><font size=5><b><?php echo $A1[1]?> -</font> <font size=5 color='#FF0000'>Php <?php echo number_format($A1[3],2)?></font></b></font></td>
                            </tr>
                            <tr>
                                <td><font size=3>Duration: <b><?php echo $A1[5]?> Hour</b></font></td>
                            </tr>
                            <tr>
                                <td><p align='justify'><?php echo $A1[2]?></p></td>
                            </tr>
                        </table>
                    </td>
                    <td width=2% style='vertical-align:top'></td>
                    <td width=30% style='vertical-align:top'>
                        <form method='POST' action='../Administrator/connection/functions.php'>
                        <table width=100%>
                            <tr>
                                <td colspan=2><font size=5 style='font:weight:bold'><b><center>RESERVE</center></b></font></td>
                            </tr>
                            <tr height=10px></tr>
                            <tr>
                                <td width=15%><b>TIME:</td>
                                <td width=55%><select name='Time' required>
                                                <option></option>
                                                <option value='10:00:00'>10:00 AM</option>
                                                <option value='11:00:00'>11:00 AM</option>
                                                <option value='12:00:00'>12:00 PM</option>
                                                <option value='13:00:00'>1:00 PM</option>
                                                <option value='14:00:00'>2:00 PM</option>
                                                <option value='15:00:00'>3:00 PM</option>
                                                <option value='16:00:00'>4:00 PM</option>
                                                <option value='17:00:00'>5:00 PM</option>
                                                <option value='18:00:00'>6:00 PM</option>
                                                <option value='19:00:00'>7:00 PM</option>
                                                <option value='20:00:00'>8:00 PM</option>
                                                <option value='21:00:00'>9:00 PM</option>
                                                <option value='22:00:00'>10:00 PM</option>
                                                <option value='23:00:00'>11:00 PM</option>
                                                <option value='00:00:00'>12:00 AM</option>
                                                <option value='1:00:00'>1:00 AM</option>
                                                <option value='2:00:00'>2:00 AM</option>
                                            </select></td>
                            </tr>
                            <tr height=10px></tr>
                            <tr>
                                <td width=15%><b>DATE:</td>
                                <td width=55%><input type='date' name='Date' required></td>
                            </tr>
                            <tr height=10px></tr>
                            <tr>
                                <td width=15%><b>TYPE:</td>
                                <td width=55%><select name='Type' required>
                                                <option></option>
                                                <option>At the Center</option>
                                                <option>Home Service</option>
                                            </select></td>
                            </tr>
                            <tr height=10px></tr>
                            <tr>
                                <td width=100% colspan=3 style='text-align:right'><input type='submit' name='CreateReservation' class='art-button' value='RESERVE'></td>
                            </tr>
                        </table>
                    </form>
                    </td>
                    <td width=2%></td>
                </tr>
                <tr height=5px>
                    <td width=100% colspan=4><hr></td>
                </tr>
            </table></center>
    </div>
    </div>
</div>
</div>

<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%;font-size:18px" >
        <center><table width=90%>
            <tr>
                <td width=100% style='text-align:right'><a href='Services.php'><input type='button' class='art-button' value='CANCEL'></a></td>
            </tr>
        </table></center>
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