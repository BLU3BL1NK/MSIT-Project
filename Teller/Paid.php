<?php
include '../Administrator/connection/connection.php';
session_start();
$CashierName = $_SESSION['CashierName'];
if(empty($_SESSION['CashierName'])){
header('location:../index.php');
}

$RID = $_GET['ReservationID'];
$_SESSION['PRID'] = $RID;
$A = mysqli_query($cnn,"SELECT tblreservation.ReservationID,tblservices.Type,tblservices.Price,tblclient.FName,tblclient.LName,tblclient.Mobile FROM tblclient INNER JOIN tblreservation ON tblreservation.ClientID = tblclient.ClientID INNER JOIN tblservices ON tblreservation.ServiceID = tblservices.`No` WHERE tblreservation.ReservationID='$RID'");
$A1 = mysqli_fetch_array($A);

$_SESSION['Bill'] = $A1[2];

$X = mysqli_query($cnn,"SELECT * FROM tblreservation WHERE ReservationID='$RID'");
$X1 = mysqli_fetch_array($X);
if($X1[7] != 'Confirmed'){
    header('location:Payment.php');
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

</style>
<script>
    function getSub(str)
    {
        if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
        else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("section").innerHTML=xmlhttp.responseText;
            }
        }
            xmlhttp.open("GET","getChange.php?q="+str,true);
            xmlhttp.send();
    }
</script>
</head>
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
            include '../Administrator/includes/Cashier/Payment.html'
        ?>
    </ul> 
    </nav>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <p style="color:#000000;font-size: 16px;">Welcome: <b><?php echo $CashierName?>!</b></p><br>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%;font-size:18px" >
        <center><font size=5><b>PAYMENT</b></font><br><br>
            <form method='POST' action='../Administrator/connection/functions.php' name="FORM1" enctype="multipart/form-data">
        <center><table width=30%>
                <tr>
                    <td width=30%>Reservation ID:</td>
                    <td width=55%><b><?php echo strtoupper($A1[0])?></b></td>
                </tr>
                <tr height=20px></tr>
                <tr>
                    <td width=15%>Services:<input type='hidden' value='<?php echo $A1[1]?>' name='Service'></td>
                    <td width=55%><b><?php echo strtoupper($A1[1])?></b></td>
                </tr>
                <tr height=20px></tr>
                <tr>
                    <td width=15%>Firstname:</td>
                    <td width=55%><b><?php echo strtoupper($A1[3])?></b></td>
                </tr>
                <tr height=20px></tr>
                <tr>
                    <td width=15%>Lastname:</td>
                    <td width=55%><b><?php echo strtoupper($A1[4])?></b></td>
                </tr>
                <tr height=20px></tr>
                <tr>
                    <td width=15%>Mobile:</td>
                    <td width=55%><b><?php echo strtoupper($A1[5])?></b></td>
                </tr>
                <tr height=20px></tr>
                <tr>
                    <td width=15%>Service Fee:<input type='hidden' value='<?php echo $A1[2]?>' name='Amount'></td>
                    <td width=55%><b><?php echo number_format($A1[2],2)?></b></td>
                </tr>
                <tr height=20px></tr>
                <tr>
                    <td width=15%>Cash:</td>
                    <td width=55%><input type='text' name='AmountPaid' onkeypress="return isNumberKey(event)" required='' onkeyup="leftTrim(this);getSub(this.value)"></td>
                </tr>
                <tr height=10px></tr>
                <tr>
                    <td width=15%>Change:</td>
                    <td width=55% id="section"><b>0.00</b></td>
                </tr>
                <tr height=20px></tr>
                <tr>
                    <td colspan=2><center><input type='submit' class='art-button' name='CashierAmountPaid' value='PRINT'></a>&nbsp;&nbsp;&nbsp;<a href='Payment.php'><input type='button' onclick='history.go(-1)' class='art-button' value='CANCEL'></a></center></td>
                </tr>
            </table></center>
        </form>
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