<?php
include '../Administrator/connection/connection.php';
session_start();

$ClientName = $_SESSION['ClientName'];
if(empty($_SESSION['ClientName'])){
header('location:../index.php');
}
$ClientID = $_SESSION['ClientNo'];
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
    <script src="../Administrator/js/jquery.js"></script>
    <script src="../Administrator/js/script.js"></script>
    <script src="../Administrator/js/script.responsive.js"></script>
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
            include '../Administrator/includes/Register/Reservation.html'
        ?>
    </ul> 
    </nav>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <p style="color:#000000;font-size: 16px;">Welcome: <b><?php echo $ClientName?>!</b></p><br>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%;font-size:18px" >
        <center><font size=5><b>LIST OF ONGOING SERVICES</b></font><br><br>
        <center><table width=100% border=1 cellspacing=0>
                <tr bgcolor='#C6DEFF'>
                    <td width=10%><center><b>RESERVATION ID</b></center></td>
                    <td width=20%><center><b>NAME</b></center></td>
                    <td width=10%><center><b>MOBILE NO</b></center></td>
                    <td width=15%><center><b>SERVICES</b></center></td>
                    <td width=20%><center><b>DATE</b></center></td>
                    <td width=15%><center><b>TYPE</b></center></td>
                    <td width=10%><center><b>STATUS</b></center></td>
                    <td width=5%><center><b>CANCEL</b></center></td>
                </tr>
                <?php
                    $B = 1;
                    $A1 = mysqli_query($cnn,"SELECT tblreservation.ReservationID,tblclient.FName,tblclient.LName,tblclient.Age,tblclient.Sex,tblclient.Mobile,tblservices.Type,tblreservation.Date,tblreservation.FTime,tblreservation.Type,tblreservation.`Status` FROM tblreservation INNER JOIN tblclient ON tblreservation.ClientID = tblclient.ClientID INNER JOIN tblservices ON tblreservation.ServiceID = tblservices.`No` WHERE tblreservation.ClientID='$ClientID' ORDER BY tblreservation.Date desc");
                    while ($A2 = mysqli_fetch_array($A1)) {
                        if($B % 2 == 1)
                            echo "<tr>";
                        else
                            echo "<tr bgcolor='#C3FDB8'>";
                            echo "<td>" . $A2[0] . "</td>";
                            echo "<td>" . $A2[1] . " " . $A2[2] . "</td>";
                            echo "<td>" . $A2[5] . "</td>";
                            echo "<td>" . $A2[6] . "</td>";
                            echo "<td>" . date('F d, Y',strtotime($A2[7])) . " - " . date('h:i A',strtotime($A2[8])) . "</td>";
                            echo "<td>" . $A2[9] . "</td>";
                            echo "<td>" . $A2[10] . "</td>";
                            if($A2[10] == 'Pending'){
                                echo "<td><center><a href='CancelReservation.php?ReservationID=" . $A2[0] . "'><img src='../Administrator/images/Cancel.png' style='width:25px;height:25px' title='CANCEL'></a></td>";
                            }else{
                                echo "<td><center> - </td>";
                            }
                            $B++;
                        }
                ?>
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