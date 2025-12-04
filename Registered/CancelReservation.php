<?php
include '../Administrator/connection/connection.php';
session_start();

$RID = $_GET['ReservationID'];

mysqli_query($cnn,"UPDATE tblreservation SET Status='Cancelled' WHERE ReservationID='$RID'");
?>
			<script type="text/javascript">
			alert("Reservation Successfully Cancelled!");
			window.location.href = "MyReservation.php";
			</script>