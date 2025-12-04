<?php
include '../Administrator/connection/connection.php';
session_start();

$CashierName = $_SESSION['CashierName'];
if(empty($_SESSION['CashierName'])){
header('location:../index.php');
}

$No = $_SESSION['CashierNo'];
$A = mysqli_query($cnn,"SELECT * FROM tbluser WHERE No='$No'");
$A1 = mysqli_fetch_array($A);
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
            include '../Administrator/includes/Cashier/MyAccount.html'
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
        <center><font size=5><b>MY ACCOUNT SETTINGS</b></font><br><br>
        <form method='POST' action='../Administrator/connection/functions.php' name="FORM1" enctype="multipart/form-data">
            <center><table width=40%>
                <tr>
                    <td width=30%>Name:</td>
                    <td width=75%><input type='text' value='<?php echo $A1[3]?>' name='Name' required='' onkeyup="leftTrim(this)"></td>
                </tr>
                <tr height=5px></tr>
                <tr>
                    <td width=25%>EMail:</td>
                    <td width=75%><input type='email' name='EMail' value='<?php echo $A1[4]?>' required='' onkeyup="leftTrim(this)"></td>
                </tr>
                 <tr height=5px></tr>
                <tr>
                    <td width=25%>Position:</td>
                    <td width=75%><select name='Position' required=''>
                        <?php
                            if($A1[7] == 'Administrator'){
                                echo "<option selected>Administrator</option>";
                                echo "<option>Cashier</option>";
                            }else{
                                echo "<option>Administrator</option>";
                                echo "<option selected>Cashier</option>";
                            }
                        ?>
                        
                        
                    </select></td>
                </tr>
                <tr height=5px></tr>
                <tr>
                    <td width=25%>Address:</td>
                    <td width=75%><input type='text' name='Address' value='<?php echo $A1[6]?>' required='' onkeyup="leftTrim(this)"></td>
                </tr>
                <tr height=5px></tr>
                <tr>
                    <td width=25%>Mobile:</td>
                    <td width=75%><input type='text' name='Mobile' required='' value='<?php echo $A1[5]?>' onkeyup="leftTrim(this)" onkeypress="return isNumberKey(event)"></td>
                </tr>
                <tr height=5px></tr>
                <tr>
                    <td width=25%>Username:</td>
                    <td width=75%><input type='text' name='Username' value='<?php echo $A1[1]?>' required='' onkeyup="leftTrim(this)"></td>
                </tr>
                <tr height=5px></tr>
                <tr>
                    <td width=25%>Old Password:</td>
                    <td width=75%><input type='password' name='OldPassword' required='' onkeyup="leftTrim(this)"></td>
                </tr>
                <tr height=5px></tr>
                <tr>
                    <td width=25%>New Password:</td>
                    <td width=75%><input type='password' name='Password' required='' onkeyup="leftTrim(this)"></td>
                </tr>
                <tr height=5px></tr>
                <tr>
                    <td width=25%>Confirm Password:</td>
                    <td width=75%><input type='password' name='CPassword' required='' onkeyup="leftTrim(this)"></td>
                </tr>
                <tr height=50px></tr>
                <tr>
                    <td width=100% colspan=2><center><input type='submit' class='art-button' name='CashierAccount' value='UPDATE'>&nbsp;&nbsp;<a href='User.php'><input type='button' class='art-button' value='CANCEL'></a></td>
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