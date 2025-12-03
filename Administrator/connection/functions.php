<?php
include 'connection.php';
session_start();
date_default_timezone_set('Asia/Manila');

if(isset($_POST['AdminLogin']))
{
	$Username	= $_POST['Username'];
	$Password 	= $_POST['Password'];

	$A = mysqli_query($cnn,"SELECT * FROM tbluser WHERE Username='$Username' and Password='$Password' AND Type='Administrator'");
	$AA = mysqli_fetch_array($A);
	$AdminName = $AA[3];
	$AdminNo	= $AA[0];
	if(mysqli_num_rows ($A)==0)
	{
		?>
			<script type="text/javascript">
			alert("Invalid Username or Password");
			window.location.href = "../index.php";
			</script>
		<?php
		}
	else
	{
		header ('location: ../Reservation.php');
		$_SESSION['AdminName'] = $AdminName;
		$_SESSION['AdminNo'] = $AdminNo;
	}
}

if(isset($_POST['CashierLogin']))
{
	$Username	= $_POST['Username'];
	$Password 	= $_POST['Password'];

	$A = mysqli_query($cnn,"SELECT * FROM tbluser WHERE Username='$Username' and Password='$Password' AND Type='Cashier'");
	$AA = mysqli_fetch_array($A);
	$CashierName = $AA[3];
	$CashierNo	= $AA[0];
	if(mysqli_num_rows ($A)==0)
	{
		?>
			<script type="text/javascript">
			alert("Invalid Username or Password");
			window.location.href = "../../Teller/index.php";
			</script>
		<?php
		}
	else
	{
		header ('location: ../../Teller/Main.php');
		$_SESSION['CashierName'] = $CashierName;
		$_SESSION['CashierNo'] = $CashierNo;
	}
}

if(isset($_POST['EditServices']))
{
	$A1		= $_POST['SName'];
	$A2 	= $_POST['Price'];
	$A3		= $_POST['Duration'];
	$A4		= $_POST['Desc'];
	$A5 	= $_POST['No'];

	$file 		= $_FILES ["Pix"];
	$Pix 		= $file ['name'];
	$type 		= $file ['type'];
	$size 		= $file ['size'];
	$tmppath 	= $file ['tmp_name'];

	if($Pix == "")
	{
		mysqli_query($cnn,"UPDATE tblservices SET Type='$A1',Description='$A4',Price='$A2',Duration='$A3' WHERE No='$A5'") or die(mysqli_error($conn));
			?>
				<script type="text/javascript">
				alert("Changes Successfully Save!");
				window.location.href = "../Services.php";
				</script>
			<?php
	}
	else
	{
		if(move_uploaded_file ($tmppath, '../Massage/'.$Pix))
		{
			mysqli_query($cnn,"UPDATE tblservices SET Type='$A1',Description='$A4',Price='$A2',Duration='$A3',Images='$Pix' WHERE No='$A5'");
			?>
				<script type="text/javascript">
				alert("Services Successfully saved!");
				window.location.href = "../Services.php";
				</script>
			<?php
		}
	}	
}

if(isset($_POST['ACreateReservation']))
{
	$A1	= $_POST['FName'];
	$A2	= $_POST['LName'];
	$A3 = $_POST['BDate'];
	$A3 = date('Y-m-d',strtotime($A3));
	$A4	= $_POST['Age'];
	$A5	= $_POST['Status'];
	$A6	= $_POST['Sex'];
	$A7	= $_POST['EMail'];
	$A8	= $_POST['Address'];
	$A9	= $_POST['CNo'];
	$A10= $_POST['Services'];
	$A11= $_POST['Time'];
	$A11 = date('H:i:s',strtotime($A11));
	$A12 = $_POST['Date'];
	$A12 = date('Y-m-d',strtotime($A12));
	$A13 = date('Y-m-d');
	$A14 = $_POST['Type'];

	$B = mysqli_query($cnn,"SELECT * FROM tblservices WHERE No='$A10'");
	$B1 = mysqli_fetch_array($B);

	$D = 60*60*$B1[5];
	$Duration =  strtotime($A6) + $D;

	$NTime = date('H:i:00',$Duration);

	$length = 8;

    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $Username 	= $randomString;

    $length = 8;

    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $Password 	= $randomString;

    $sql = mysqli_query($cnn,"SELECT * FROM tblreservation WHERE Date='$A12' AND FTime AND TTime BETWEEN '$A11' AND '$NTime' OR '$A11' AND '$NTime' BETWEEN FTime AND TTime");
    if(mysqli_num_rows($sql) >= 13){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('We are fully book in this time of day. Please try again!')
				window.history.back()
				</SCRIPT>");
    }elseif($A13 > $A12){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid Reservation Date!')
				window.history.back()
				</SCRIPT>");
    }else{
    	$A = mysqli_query($cnn,"SELECT count(*) FROM tblreservation");
		$X1 = mysqli_fetch_array($A);

		$count = $X1[0] + 1;

		if($count < 10){
			$count = "RID-000" . $count;
		}elseif($count < 100){
			$count = "RID-00" . $count;
		}elseif($count < 1000){
			$count = "RID-0" . $count;
		}else{
			$count = "RID-" . $count;
		}

		$X = mysqli_query($cnn,"SELECT No FROM tblclient ORDER BY No desc LIMIT 1");
		$X1 = mysqli_fetch_array($X);

				$ClientID = $X1[0] + 1;

				if($ClientID < 10){
					$ClientID = 'CID00' . $ClientID;
				}elseif($ClientID < 100){
					$ClientID = 'CID0' . $ClientID;
				}else{
					$ClientID = 'CID' . $ClientID;
				}
			mysqli_query($cnn,"INSERT INTO tblclient(ClientID,FName,LName,BDate,Age,Status,Sex,EMail,Address,Mobile,Username,Password) VALUES('$ClientID','$A1','$A2','$A3','$A4','$A5','$A6','$A7','$A8','$A9','$Username','$Password')") or die(mysqli_error($cnn));




		mysqli_query($cnn,"INSERT INTO tblreservation(ReservationID,ClientID,ServiceID,Date,FTime,TTime,Type,Status) VALUES('$count','$ClientID','$A10','$A12','$A11','$NTime','$A14','Pending')");
		?>
				<script type="text/javascript">
				alert("Reservation Successfully Save!");
				window.location.href = "../Create.php";
				</script>
			<?php
    }
}

if(isset($_POST['ACreateReservation']))
{
	$A1= $_SESSION['MassageID'];
	$A2= $_POST['Time'];
	$A2 = date('H:i:s',strtotime($A2));
	$A3 = $_POST['Date'];
	$A3 = date('Y-m-d',strtotime($A3));
	$A4 = date('Y-m-d');
	$A5 = $_POST['Type'];

	$B = mysqli_query($cnn,"SELECT * FROM tblservices WHERE No='$A10'");
	$B1 = mysqli_fetch_array($B);

	$D = 60*60*$B1[5];
	$Duration =  strtotime($A6) + $D;

	$NTime = date('H:i:00',$Duration);

	$length = 8;

    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $Username 	= $randomString;

    $length = 8;

    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $Password 	= $randomString;

	$Z = mysqli_query($cnn,"SELECT count(*) FROM tbltherapist");
	$Z1 = mysqli_fetch_array($Z);

	$NT = $Z1[0];

    $sql = mysqli_query($cnn,"SELECT * FROM tblreservation WHERE Date='$A12' AND FTime AND TTime BETWEEN '$A11' AND '$NTime' OR '$A11' AND '$NTime' BETWEEN FTime AND TTime");
    if(mysqli_num_rows($sql) >= $NT){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('We are fully book in this time of day. Please try again!')
				window.history.back()
				</SCRIPT>");
    }elseif($A13 > $A12){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid Reservation Date!')
				window.history.back()
				</SCRIPT>");
    }else{
    	$A = mysqli_query($cnn,"SELECT count(*) FROM tblreservation");
		$X1 = mysqli_fetch_array($A);

		$count = $X1[0] + 1;

		if($count < 10){
			$count = "RID-000" . $count;
		}elseif($count < 100){
			$count = "RID-00" . $count;
		}elseif($count < 1000){
			$count = "RID-0" . $count;
		}else{
			$count = "RID-" . $count;
		}

		$X = mysqli_query($cnn,"SELECT No FROM tblclient ORDER BY No desc LIMIT 1");
		$X1 = mysqli_fetch_array($X);

				$ClientID = $X1[0] + 1;

				if($ClientID < 10){
					$ClientID = 'CID00' . $ClientID;
				}elseif($ClientID < 100){
					$ClientID = 'CID0' . $ClientID;
				}else{
					$ClientID = 'CID' . $ClientID;
				}
			mysqli_query($cnn,"INSERT INTO tblclient(ClientID,FName,LName,BDate,Age,Status,Sex,EMail,Address,Mobile,Username,Password) VALUES('$ClientID','$A1','$A2','$A3','$A4','$A5','$A6','$A7','$A8','$A9','$Username','$Password')") or die(mysqli_error($cnn));




		mysqli_query($cnn,"INSERT INTO tblreservation(ReservationID,ClientID,ServiceID,Date,FTime,TTime,Type,Status) VALUES('$count','$ClientID','$A10','$A12','$A11','$NTime','$A14','Pending')");
		?>
				<script type="text/javascript">
				alert("Reservation Successfully Save!");
				window.location.href = "../Create.php";
				</script>
			<?php
    }
}

if(isset($_POST['CreateReservation']))
{
	$A1 = $_SESSION['MassageID'];
	$A2 = $_POST['Time'];
	$A2 = date('H:i:s',strtotime($A2));
	$A3 = $_POST['Date'];
	$A3 = date('Y-m-d',strtotime($A3));
	$A4 = date('Y-m-d');
	$A5 = $_POST['Type'];
	$A6 = $_SESSION['ClientNo'];

	$B = mysqli_query($cnn,"SELECT * FROM tblservices WHERE No='$A1'");
	$B1 = mysqli_fetch_array($B);

	$D = 60*60*$B1[5];
	$Duration =  strtotime($A6) + $D;

	$NTime = date('H:i:00',$Duration);

	$Z = mysqli_query($cnn,"SELECT count(*) FROM tbltherapist");
	$Z1 = mysqli_fetch_array($Z);

	$NT = $Z1[0];

    $sql = mysqli_query($cnn,"SELECT * FROM tblreservation WHERE Date='$A3' AND FTime AND TTime BETWEEN '$A2' AND '$NTime' OR '$A2' AND '$NTime' BETWEEN FTime AND TTime");
    if(mysqli_num_rows($sql) > $NT){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('We are fully book in this time of day. Please try again!')
				window.history.back()
				</SCRIPT>");
    }elseif($A4 > $A3){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid Reservation Date!')
				window.history.back()
				</SCRIPT>");
    }else{
    	$A = mysqli_query($cnn,"SELECT count(*) FROM tblreservation");
		$X1 = mysqli_fetch_array($A);

		$count = $X1[0] + 1;

		if($count < 10){
			$count = "RID-000" . $count;
		}elseif($count < 100){
			$count = "RID-00" . $count;
		}elseif($count < 1000){
			$count = "RID-0" . $count;
		}else{
			$count = "RID-" . $count;
		}

		mysqli_query($cnn,"INSERT INTO tblreservation(ReservationID,ClientID,ServiceID,Date,FTime,TTime,Type,Status) VALUES('$count','$A6','$A1','$A3','$A2','$NTime','$A5','Pending')");
		?>
				<script type="text/javascript">
				alert("Reservation Successfully Save!");
				window.location.href = "../../Registered/Main.php";
				</script>
			<?php
    }
}

if(isset($_POST['Create']))
{
	$A1	= $_POST['FName'];
	$A2	= $_POST['LName'];
	$A3 = $_POST['BDate'];
	$A3 = date('Y-m-d',strtotime($A3));
	$A4	= $_POST['Age'];
	$A5	= $_POST['Status'];
	$A6	= $_POST['Sex'];
	$A7	= $_POST['EMail'];
	$A8	= $_POST['Address'];
	$A9	= $_POST['CNo'];
	$A10= $_POST['User'];
	$A11= $_POST['Pass'];
	$A12 = $_POST['VPass'];

    $sql = mysqli_query($cnn,"SELECT * FROM tblclient WHERE EMail='$A7'");
    if(mysqli_num_rows($sql) >= 1){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('EMail Address Already Exist!')
				window.history.back()
				</SCRIPT>");
    }if($A11 != $A12){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Password doesnt Match!')
				window.history.back()
				</SCRIPT>");
    }else{

		$X = mysqli_query($cnn,"SELECT No FROM tblclient ORDER BY No desc LIMIT 1");
		$X1 = mysqli_fetch_array($X);

				$ClientID = $X1[0] + 1;

				if($ClientID < 10){
					$ClientID = 'CID00' . $ClientID;
				}elseif($ClientID < 100){
					$ClientID = 'CID0' . $ClientID;
				}else{
					$ClientID = 'CID' . $ClientID;
				}
			mysqli_query($cnn,"INSERT INTO tblclient(ClientID,FName,LName,BDate,Age,Status,Sex,EMail,Address,Mobile,Username,Password,Stat) VALUES('$ClientID','$A1','$A2','$A3','$A4','$A5','$A6','$A7','$A8','$A9','$A10','$A11','0')") or die(mysqli_error($cnn));
						$to = $A7;$subject = "Decent Touch Massage Center";
						$message .= "<html><body><div style='width:900px; display:block; margin:0 auto;'>";
						$message .= "<div style='width:100%; border-top: 1px solid #d6d6d6;border-bottom: 1px solid #d6d6d6; display: inline-table; '>";
						$message .= "<table width='50%' style='display:block;float:left'>";
						$message .= "<tr height=30px><p>Hello " . $A1 . " " . $A2 . "</p></tr>";
						$message .= "<tr height=30px><p>Thank you very much for registering at Decent Touch Massage Center Online Reservation System.</p></tr>";
						$message .= "<tr height=30px><p>Your regisration has been recieve by the Administrator.</p></tr>";
						$message .= "<tr height=30px><p>You account information</p></tr>";
						$message .= "<tr height=50px></tr>";
						$message .= "<tr><td>Username: </td><td>" . $A10 . "</td></tr>";
						$message .= "<tr><td>Password: </td><td>" . $A11 . "</td></tr>";
						$message .= "<tr><td>Contact No.: </td><td>" . $A9 . "</td></tr><br><br>";
						$message .= "<tr><td colspan=2>Please Click the link below to confirm your account: </td></tr>";
						$message .= "<tr><td colspan=2>http://goldas.schoolwebs.org.ph/Welcome.php?ClientID=$ClientID</td></tr>";
						$message .= "</table>";

						$message .="</div>" ;
						 $message .="</body></html>"; 
						 
						$from = "firstpageroydante@gmail.com";$headers = "MIME-Version: 1.0" . "\r\n";$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n From: Roy Dante";

						mail($A7,$subject,$message,$headers);
			?>
				<script type="text/javascript">
				alert("Account Successfully Created! Please Check your email for Verification.");
				window.location.href = "../../index.php";
				</script>
			<?php
    }
}

if(isset($_POST['ClientAccount']))
{
	$A1	= $_POST['FName'];
	$A2	= $_POST['LName'];
	$A3 = $_POST['BDate'];
	$A3 = date('Y-m-d',strtotime($A3));
	$A4	= $_POST['Age'];
	$A5	= $_POST['Status'];
	$A6	= $_POST['Sex'];
	$A7	= $_POST['EMail'];
	$A8	= $_POST['Address'];
	$A9	= $_POST['CNo'];
	$A10= $_POST['User'];
	$A11= $_POST['Pass'];
	$A12 = $_POST['NPass'];
	$A13 = $_POST['CPass'];
	$A14 = $_SESSION['ClientNo'];

    $sql = mysqli_query($cnn,"SELECT Password FROM tblclient WHERE ClientID='$A14'");
    $res = mysqli_fetch_array($sql);
    $OPass = $res[0];
    if($OPass != $A11){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid Old Password!')
				window.history.back()
				</SCRIPT>");
    }elseif($A13 != $A12){
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Password doesnt Match!')
				window.history.back()
				</SCRIPT>");
    }else{

		mysqli_query($cnn,"UPDATE tblclient SET FName='$A1',LName='$A2',BDate='$A3',Age='$A4',Status='$A5',Sex='$A6',EMail='$A7',Address='$A8',Mobile='$A9',Username='$A10',Password='$A12' WHERE ClientID='$A14'") or die(mysqli_error($cnn));
			?>
				<script type="text/javascript">
				alert("Account Successfully Updated.");
				window.location.href = "../../Registered/Account.php";
				</script>
			<?php
    }
}

if(isset($_POST['MyAccount']))
{
	$A1		= $_POST['Name'];
	$A2 	= $_POST['EMail'];
	$A3		= $_POST['Position'];
	$A4		= $_POST['Mobile'];
	$A5		= $_POST['Username'];
	$A6		= $_POST['Password'];
	$A7		= $_POST['CPassword'];
	$A8		= $_POST['Address'];
	$A9		= $_POST['OldPassword'];
	$No 	= $_SESSION['AdminNo'];

	$X = mysqli_query($cnn,"SELECT * FROM tbluser WHERE No='$No'");
	$X1 = mysqli_fetch_array($X);

	$Password = $X1[2];

	if($A6 != $A7){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Password Doesnt Match!')
				window.history.back()
				</SCRIPT>");
	}elseif($Password != $A9){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid Old Password!')
				window.history.back()
				</SCRIPT>");

	}else{
		mysqli_query($cnn,"UPDATE tbluser SET Name='$A1',EMail='$A2',Type='$A3',CNo='$A4',Username='$A5',Password='$A6',Address='$A8' WHERE No='$No'") or die(mysqli_error($cnn));
			?>
				<script type="text/javascript">
				alert("User Successfully Updated!");
				window.location.href = "../MyAccount.php";
				</script>
			<?php
	}

}

if(isset($_POST['CashierAccount']))
{
	$A1		= $_POST['Name'];
	$A2 	= $_POST['EMail'];
	$A3		= $_POST['Position'];
	$A4		= $_POST['Mobile'];
	$A5		= $_POST['Username'];
	$A6		= $_POST['Password'];
	$A7		= $_POST['CPassword'];
	$A8		= $_POST['Address'];
	$A9		= $_POST['OldPassword'];
	$No 	= $_SESSION['CashierNo'];

	$X = mysqli_query($cnn,"SELECT * FROM tbluser WHERE No='$No'");
	$X1 = mysqli_fetch_array($X);

	$Password = $X1[2];

	if($A6 != $A7){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Password Doesnt Match!')
				window.history.back()
				</SCRIPT>");
	}elseif($Password != $A9){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid Old Password!')
				window.history.back()
				</SCRIPT>");

	}else{
		mysqli_query($cnn,"UPDATE tbluser SET Name='$A1',EMail='$A2',Type='$A3',CNo='$A4',Username='$A5',Password='$A6',Address='$A8' WHERE No='$No'") or die(mysqli_error($cnn));
			?>
				<script type="text/javascript">
				alert("Account Successfully Updated!");
				window.location.href = "../../Teller/MyAccount.php";
				</script>
			<?php
	}

}

if(isset($_POST['AddServices']))
{
	$A1		= $_POST['SName'];
	$A2 	= $_POST['Price'];
	$A3		= $_POST['Duration'];
	$A4		= $_POST['Desc'];

	$file 		= $_FILES ["Pix"];
	$Pix 		= $file ['name'];
	$type 		= $file ['type'];
	$size 		= $file ['size'];
	$tmppath 	= $file ['tmp_name'];

	if(move_uploaded_file ($tmppath, '../Massage/'.$Pix))
		{
			mysqli_query($cnn,"INSERT INTO tblservices(Type,Price,Duration,Description,Images,Category) VALUES('$A1','$A2','$A3','$A4','$Pix','Regular')");
			?>
				<script type="text/javascript">
				alert("Services Successfully saved!");
				window.location.href = "../AddServices.php";
				</script>
			<?php
		}
}

if(isset($_POST['AddPromo']))
{
	$A1		= $_POST['SName'];
	$A2 	= $_POST['Price'];
	$A3		= $_POST['Duration'];
	$A4		= $_POST['Desc'];

	$file 		= $_FILES ["Pix"];
	$Pix 		= $file ['name'];
	$type 		= $file ['type'];
	$size 		= $file ['size'];
	$tmppath 	= $file ['tmp_name'];

	if(move_uploaded_file ($tmppath, '../Massage/'.$Pix))
		{
			mysqli_query($cnn,"INSERT INTO tblservices(Type,Price,Duration,Description,Images,Category) VALUES('$A1','$A2','$A3','$A4','$Pix','Promo')");
			?>
				<script type="text/javascript">
				alert("Promo Successfully saved!");
				window.location.href = "../AddPromo.php";
				</script>
			<?php
		}
}

if(isset($_POST['AddPackage']))
{
	$A1		= $_POST['SName'];
	$A2 	= $_POST['Price'];
	$A3		= $_POST['Duration'];
	$A4		= $_POST['Desc'];

	$file 		= $_FILES ["Pix"];
	$Pix 		= $file ['name'];
	$type 		= $file ['type'];
	$size 		= $file ['size'];
	$tmppath 	= $file ['tmp_name'];

	if(move_uploaded_file ($tmppath, '../Massage/'.$Pix))
		{
			mysqli_query($cnn,"INSERT INTO tblservices(Type,Price,Duration,Description,Images,Category) VALUES('$A1','$A2','$A3','$A4','$Pix','Package')") or die(mysqli_error($cnn));
			?>
				<script type="text/javascript">
				alert("Package Successfully saved!");
				window.location.href = "../AddPackage.php";
				</script>
			<?php
		}
}

if(isset($_POST['AddUser']))
{
	$A1		= $_POST['Name'];
	$A2 	= $_POST['EMail'];
	$A3		= $_POST['Position'];
	$A4		= $_POST['Mobile'];
	$A5		= $_POST['Username'];
	$A6		= $_POST['Address'];

	$length = 8;

    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $Password 	= $randomString;

	$M = mysqli_query($cnn,"SELECT * FROM tbluser WHERE EMail='$A2'");
	if(mysqli_num_rows($M) == 1){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('EMail Already Exist!')
				window.history.back()
				</SCRIPT>");
	}else{
		mysqli_query($cnn,"INSERT INTO tbluser(Name,EMail,Type,CNo,Username,Password,Address) VALUES('$A1','$A2','$A3','$A4','$A5','$Password','$A6')") or die(mysqli_error($cnn));
		
			$to = $A2;$subject = "Your login details for Decent Touch Massage Center Online Reservation Center";
			$message .= "<html><body><div style='width:900px; display:block; margin:0 auto;'>";
			$message .= "<div style='width:100%; border-top: 1px solid #d6d6d6;border-bottom: 1px solid #d6d6d6; display: inline-table; '>";
			$message .= "<table width='50%' style='display:block;float:left'>";
			$message .= "<tr><p>Hello " . $A1 . "</p></tr>";
			$message .= "<tr height=50px></tr>";
			$message .= "<tr><p>Your Account information for Decent Touch Massage Center Online Reservation Center.</p></tr>";
			$message .= "<tr height=50px></tr>";
			$message .= "<tr><td>Your Username is: </td><td>" . $A5 . "</td></tr>";
			$message .= "<tr><td>Your password is: </td><td>" . $Password . "</td></tr>";
			$message .= "<tr height=50px></tr>";
			$message .= "</table>";

			$message .="</div>" ;
			$message .="</body></html>"; 
								 
			$from = "firstpageroydante@gmail.com";$headers = "MIME-Version: 1.0" . "\r\n";$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n From: Roy Dante";

			mail($A2,$subject,$message,$headers);

			$uname = "APIC63SQ7CP4O";
		    $upass = "APIC63SQ7CP4OC63SQ";
		    $usend = "MarCodes";
		    $umobi = $A4;
		    $umess = "Login info for Decent Touch Massage Center. User: " . $A5 . " Pass: " . $Password;   
		            //print "<script>window.location='http://gateway.onewaysms.com.au:10001/api.aspx?apiusername=$uname&apipassword=$upass&senderid=$usend&mobileno=$umobi&message=$umess&languagetype=1';</script>";
				
			?>
				<script type="text/javascript">
				alert("User Successfully saved!");
				window.location.href = "../AddUser.php";
				</script>
			<?php
	}

}

if(isset($_POST['AddNews']))
{
	$A1		= $_POST['News'];
	$A2 	= date('Y-m-d');


		mysqli_query($cnn,"INSERT INTO tblnews(News,Date) VALUES('$A1','$A2')") or die(mysqli_error($cnn));
		
			?>
				<script type="text/javascript">
				alert("News Successfully saved!");
				window.location.href = "../News.php";
				</script>
			<?php
}

if(isset($_POST['AddTherapist']))
{
	$A1		= $_POST['Name'];

	$file 		= $_FILES ["Pix"];
	$Pix 		= $file ['name'];
	$type 		= $file ['type'];
	$size 		= $file ['size'];
	$tmppath 	= $file ['tmp_name'];

	if(move_uploaded_file ($tmppath, '../Therapist/'.$Pix))
		{
			mysqli_query($cnn,"INSERT INTO tbltherapist(Pix,Name) VALUES('$Pix','$A1')") or die(mysqli_error($cnn));
			?>
				<script type="text/javascript">
				alert("Therapist Successfully saved!");
				window.location.href = "../AddTherapist.php";
				</script>
			<?php
		}
}

if(isset($_POST['Login']))
{
	$Username	= $_POST['login'];
	$Password 	= $_POST['password'];

	$A = mysqli_query($cnn,"SELECT * FROM tblclient WHERE Username='$Username' and Password='$Password' AND Stat='1'");
	$AA = mysqli_fetch_array($A);
	$ClientName = $AA[1] . " " . $AA[2];
	$ClientNo	= $AA[0];
	if(mysqli_num_rows ($A)==0)
	{
		?>
			<script type="text/javascript">
			alert("Invalid Username or Password");
			window.location.href = "../../index.php";
			</script>
		<?php
		}
	else
	{
		header ('location: ../../Registered/Main.php');
		$_SESSION['ClientName'] = $ClientName;
		$_SESSION['ClientNo'] = $ClientNo;
	}
}

if(isset($_POST['EditTherapist']))
{
	$A1		= $_POST['Name'];
	$A2		= $_POST['No'];

	$file 		= $_FILES ["Pix"];
	$Pix 		= $file ['name'];
	$type 		= $file ['type'];
	$size 		= $file ['size'];
	$tmppath 	= $file ['tmp_name'];

if($Pix == "")
	{
			mysqli_query($cnn,"UPDATE tbltherapist SET Name='$A1' WHERE No='$A2'") or die(mysqli_error($cnn));
			?>
				<script type="text/javascript">
				alert("Therapist Successfully Updated!");
				window.location.href = "../Therapist.php";
				</script>
			<?php
	}else{
		if(move_uploaded_file ($tmppath, '../Therapist/'.$Pix))
		{
			mysqli_query($cnn,"UPDATE tbltherapist SET Name='$A1',Pix='$Pix' WHERE No='$A2'") or die(mysqli_error($cnn));
			?>
				<script type="text/javascript">
				alert("Therapist Successfully Updated!");
				window.location.href = "../Therapist.php";
				</script>
			<?php
		}
	}
	
}


if(isset($_POST['EditNews']))
{
	$A1		= $_POST['News'];
	$A2 	= $_POST['No'];


		mysqli_query($cnn,"UPDATE tblnews SET News='$A1' WHERE No='$A2'") or die(mysqli_error($cnn));
		
			?>
				<script type="text/javascript">
				alert("News Successfully Updated!");
				window.location.href = "../News.php";
				</script>
			<?php
}
if(isset($_POST['AmountPaid']))
{
	$A1		= date('Y-m-d');
	$A2 	= $_POST['Service'];
	$A3		= $_POST['Amount'];
	$A4		= $_SESSION['AdminName'];
	$A5 	= $_SESSION['Amount'];
	$A6 	= $_SESSION['PRID'];

	if($A5 < $A3){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid Payment Amount!')
				window.history.back()
				</SCRIPT>");
	}else{
		$X = mysqli_query($cnn,"SELECT count(*) FROM tblreport");
		$X1 = mysqli_fetch_array($X);

		$Count = $X1[0] + 1;
		if($Count < 10){
			$Count = 'TN0000000' . $Count;
		}elseif($Count < 100){
			$Count = 'TN000000' . $Count;
		}		elseif($Count < 1000){
			$Count = 'TN00000' . $Count;
		}elseif($Count < 10000){
			$Count = 'TN0000' . $Count;
		}elseif($Count < 100000){
			$Count = 'TN000' . $Count;
		}elseif($Count < 1000000){
			$Count = 'TN00' . $Count;
		}elseif($Count < 10000000){
			$Count = 'TN0' . $Count;
		}else{
			$Count = 'TN' . $Count;
		}
		$_SESSION['TN'] = $Count;
		mysqli_query($cnn,"UPDATE tblreservation SET Status='Paid' WHERE ReservationID='$A6'");
		mysqli_query($cnn,"INSERT INTO tblreport(Date,Service,Amount,Cashier) VALUES('$A1','$A2','$A3','$A4')");
		header('location:../PrintReciept.php');
	}
}

if(isset($_POST['CashierAmountPaid']))
{
	$A1		= date('Y-m-d');
	$A2 	= $_POST['Service'];
	$A3		= $_POST['Amount'];
	$A4		= $_SESSION['AdminName'];
	$A5 	= $_SESSION['Amount'];
	$A6 	= $_SESSION['PRID'];

	if($A5 < $A3){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Invalid Payment Amount!')
				window.history.back()
				</SCRIPT>");
	}else{
		$X = mysqli_query($cnn,"SELECT count(*) FROM tblreport");
		$X1 = mysqli_fetch_array($X);

		$Count = $X1[0] + 1;
		if($Count < 10){
			$Count = 'TN0000000' . $Count;
		}elseif($Count < 100){
			$Count = 'TN000000' . $Count;
		}		elseif($Count < 1000){
			$Count = 'TN00000' . $Count;
		}elseif($Count < 10000){
			$Count = 'TN0000' . $Count;
		}elseif($Count < 100000){
			$Count = 'TN000' . $Count;
		}elseif($Count < 1000000){
			$Count = 'TN00' . $Count;
		}elseif($Count < 10000000){
			$Count = 'TN0' . $Count;
		}else{
			$Count = 'TN' . $Count;
		}
		$_SESSION['TN'] = $Count;
		mysqli_query($cnn,"UPDATE tblreservation SET Status='Paid' WHERE ReservationID='$A6'");
		mysqli_query($cnn,"INSERT INTO tblreport(Date,Service,Amount,Cashier) VALUES('$A1','$A2','$A3','$A4')");
		header('location:../../Teller/PrintReciept.php');
	}
}

if(isset($_POST['Forgot']))
{
	$ForgotPassword 	= $_POST['ForgotPassword'];

		$A = mysqli_query($cnn,"SELECT * FROM tblclient WHERE EMail='$ForgotPassword'") or die(mysql_error());
		if(mysqli_num_rows($A) <= 0){

			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('EMail address Doesnt exist!')
			window.history.back()
			</SCRIPT>");
		}else{
			$AA = mysqli_fetch_array($A);
						$EMail = $ForgotPassword;
						$Username = $AA[10];
						$Password = $AA[11];
						$Name = $AA[1] . " " . $AA[2];
						$to = $EMail;$subject = "Your login details for Decent Touch Massage Center Online Reservation Center";
						$message .= "<html><body><div style='width:900px; display:block; margin:0 auto;'>";
						$message .= "<div style='width:100%; border-top: 1px solid #d6d6d6;border-bottom: 1px solid #d6d6d6; display: inline-table; '>";
						$message .= "<table width='50%' style='display:block;float:left'>";
						$message .= "<tr><p>Hello " . $Name . "</p></tr>";
						$message .= "<tr height=50px></tr>";
						$message .= "<tr><p>You have requested to retrieve your password for Decent Touch Massage Center Online Reservation Center. If you did not request this, please ignore it. Thank You!</p></tr>";
						$message .= "<tr height=50px></tr>";
						$message .= "<tr><td>Your Username: </td><td>" . $Username . "</td></tr>";
						$message .= "<tr><td>Your Password: </td><td>" . $Password . "</td></tr>";
						$message .= "<tr height=50px></tr>";
						$message .= "<tr><td>Thank You,</td></tr>";
						$message .= "<tr><td>Decent Touch Massage Center</td></tr>";
						$message .= "</table>";

						$message .="</div>" ;
						$message .="</body></html>"; 
											 
						$from = "firstpageroydante@gmail.com";$headers = "MIME-Version: 1.0" . "\r\n";$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n From: Roy Dante";

						mail($EMail,$subject,$message,$headers);
					?>
						<script type="text/javascript">
						alert("Please check your email for account information!");
						window.location.href = "../../index.php";
						</script>
					
					<?php
		}
}
?>

