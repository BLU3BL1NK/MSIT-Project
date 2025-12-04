<?php
include '../Administrator/connection/connection.php';
session_start();

$CashierName = $_SESSION['CashierName'];
if(empty($_SESSION['CashierName'])){
header('location:../index.php');
}

$RID = $_SESSION['PRID'];
$A = mysqli_query($cnn,"SELECT tblclient.FName,tblclient.LName,tblclient.Address,tblservices.Type,tblservices.Price FROM tblclient INNER JOIN tblreservation ON tblreservation.ClientID = tblclient.ClientID INNER JOIN tblservices ON tblreservation.ServiceID = tblservices.`No` WHERE tblreservation.ReservationID='$RID'");
$A1 = mysqli_fetch_array($A);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Decent Touch Massage</title>

</head>
<body>
<p><center><b><font size=4>DECENT TOUCH MASSAGE CENTER</font></b><br>Pagadian City, Zamboanga del Sur</center></p><br>
        <p><center><b><font size=5>PAYMENT RECEIPT</font></b></center></p>
        <p><center><font size=3>Transaction No: <b><?php echo $_SESSION['TN']?></b></font></center></p><br><br>
    <center><table width=100% frame='box'>
        <tr>
            <td width=100%>
                <center><table width=100%>
                    <tr>
                        <td width=45%>
                            <table width=100%>
                                <tr>
                                    <td width=30%>DATE:</td>
                                    <td width=70%><b><?php echo date('F d, Y')?></b></td>
                                </tr>
                                <tr height=20px></tr>
                                <tr>
                                    <td width=30%>NAME:</td>
                                    <td width=70%><b><?php echo $A1[0] . " " . $A1[1]?></b></td>
                                </tr>
                            </table>
                        </td>
                        <td width=60%>
                            <table width=100%>
                                <tr>
                                    <td width=30%>ADDRESS:</td>
                                    <td width=70%><b><?php echo $A1[2]?></b></td>
                                </tr>
                                <tr height=20px></tr>
                                <tr>
                                    <td width=35%>SERVICE TYPE:</td>
                                    <td width=70%><b><?php echo $A1[3]?></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table></center>
            </tr>
        </td>
        <tr height=50px></tr>
            <tr>
                <td>
                <center><table width=100%>
                    <tr><td width=45%>
                            <table width=100%>
                                
                            </table>
                        </td>
                        <td width=55%>
                            <table width=100%>
                                <tr>
                                    <td width=50%><b>SERVICE FEE:</b></td>
                                    <td width=30%><b><?php echo number_format($A1[4],2) ?></b></td>
                                </tr>
                                <tr height=10px></tr>
                                <tr>
                                    <td width=30%><b>CASH:</b></td>
                                    <td width=80%><b><?php echo number_format($_SESSION['Amount'],2) ?></td>
                                </tr>
                                <tr height=10px></tr>
                                <tr>
                                    <td width=30%><b>CHANGE:</b></td>
                                    <td width=80%><b><?php echo number_format($_SESSION['Change'],2) ?></td>
                                </tr>
                                <tr height=50px></tr>
                                <tr height=10px></tr>
                                <tr>
                                    <td width=30%>&nbsp;</td>
                                    <td width=80%><center><b><u><?php echo strtoupper($CashierName)?></u></b></td>
                                </tr>
                                <tr>
                                    <td width=30%>&nbsp;</td>
                                    <td width=80%><center>CASHIER</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table></center>
            </td>
        </tr>
    </table></center>
    <script type="text/javascript">
            window.print();
            </script>
</body></html>