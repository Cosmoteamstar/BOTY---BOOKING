<?php
	include('connector.php');
	checkLogin();
	if(!empty($_POST)){
		if(is_uploaded_file($_FILES['slipPath']['tmp_name'])){
			move_uploaded_file($_FILES['slipPath']['tmp_name'],'assets/slip'.$_FILES['slipPath']['name']);
			$pic = 'assets/slip'.$_FILES['slipPath']['name'];
			$SQL = 'UPDATE bookings SET slipPath="'.$pic.'" WHERE idBook='.$_GET['booking'];
			$ade = doSQL($SQL,'ส่งหลักฐานการจองแล้ว รอแอดมินยืนยันการจอง','เกิดข้อผิดพลาด ไม่สามารถส่งหลักฐานได้','booking.php');
            #echo $SQL;
		}
	}
	$SQL = 'SELECT bookings.*,rooms.*,types.* FROM bookings,rooms,types WHERE rooms.idRoom = bookings.idRoom AND bookings.idBook ='.$_GET['booking'];
	$rsBooking = doSelect($SQL);
	$booking = mysqli_fetch_assoc($rsBooking);
?>
<!DOCTYPE html>
<html lang="en">
<form method="POST" enctype="multipart/form-data">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>BOTY.Booking Deatil</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
        <?php include('navbook.php') ?>
        <header class="masthead  text-white text-center">
        <div class="container">
        <?php

if($booking){
    if($booking['status']=='Y'){
        $txt = 'Confirm ';
        $class = 'success';

    }elseif($booking['status']=='C'){
        $txt = 'Cancle by Admin ';
        $class = 'danger';
    }elseif(($booking['status']=='N')&&(!empty($booking['slipPath']))){
        $txt = 'Waiting for Admin ';
        $class = 'warning';
    }elseif($booking['status']=='O'){
        $txt = 'Stay ';
        $class = 'secondary';
    }else{
        $txt = 'Waiting for Payment ';
        $txt.= '<input type="file" id="slipPath" name="slipPath">';
        $txt.= '<button type="submit" class="btn btn-warning text-white" id="save" name="save">SAVE</button>';
        $class = 'danger';
    }

?>
<div class="alert alert-<?=$class?>" role="alert">
<strong><?=$txt?></strong></div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-4"></div>
                        <center>
						<table class="table mt-5 mb-5">
							<tr>
								<td>Name</td>
								<td><?php 
								if(isset($_SESSION["userID"])){
								echo $_SESSION["userName"];}?></td>
							</tr>
						
							<tr>
								<td>Booking Date</td>
								<td><?=$booking['BookingDate']?></td>
							</tr>
							<tr>
								<td>Room name</td>
								<td><?=$booking['roomName']?></td>
							</tr>
							<tr>
								<td>RON.</td>
								<td><?=$booking['peopleCount']?></td>
							</tr>
							<tr>
								<td>CheckinDate</td>
								<td><?=$booking['checkinDate']?></td>
							</tr>
							<tr>
								<td>Price</td>
								<td><?=$booking['price']?> Bath</td>
							</tr>
                            <tr>
								<td>Special Request ♥</td>
								<td><?=$booking['special']?></td>
							</tr>
							<tr>
								<td colspan="2">Payment here!!</td>
								<td></td>
							</tr>
                            <tr>
                                    <td colspan="2" class="text-muted">If you had transferred. Please wait for confirmation from admin for no more than 30 minutes.</td>
                            </tr>
                            <?php
                            if(empty($booking['slipPath'])){
                            ?>
                            <tr>
                            <td colspan="2">
                            <img src="assets/slip.jpg" class="img-fluid" style="width:300px; height:400px;">
                           </td>
                                <td></td>
                            </tr>
                            <?php
                            }
                           ?>
							<tr>
								
								<td class="text-center" colspan="2"><a class="btn btn-outline-primary noview" onclick="window.print()">พิมพ์ใบจอง</a></td>
								
								<?php
							}else{
								echo "<h1 class=\"text-center\">ไม่มีการจอง</h1>";
							}
							?>
							</tr>
						</table>
                        </center>
					</div>
				</div>
		</div>
        </header>
        <?php include('footer.php') ?>
    </body>
</form>
</html>