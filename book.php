<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLogin();
$SQL = "SELECT rooms.* FROM rooms WHERE rooms.idRoom=".$_GET['book']."";
$rsty = doSelect($SQL);

if(!empty($_POST['txtCount'])){
$res = $_POST['txtCheckinDate'].' '.$_POST['txtCheckinTime'];
$SQL = 'INSERT INTO bookings(idUser,idAdmin,idRoom,peopleCount,BookingDate,checkinDate,special,slipPath)
VALUES ('.$_SESSION['userID'].','."1".','.$_GET['book'].','.$_POST['txtCount'].',"'.date('Y-m-d').'","'.$res.':00","'.$_POST["txtSpe"].'","")';

$UTA = 'UPDATE rooms SET quantity = quantity - 1 WHERE idRoom ='.$_GET['book'].'';
    mysqli_query($conn,$UTA);
	doSQL($SQL,"บันทึกข้อมูลเรียบร้อย","เกิดข้อผิดพลาด ไม่สามารถจองได้","booking.php");
}
#echo $SQL;
#echo $UTA;
?>
<!DOCTYPE html>
<html lang="en">
<form method=POST>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>BOTY.BOOK</title>
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
            while($row = mysqli_fetch_assoc($rsty)){
            ?>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="card-text card w-50 p-3">
                        <center><img src="assets/img/3.png" style="width:20%;"></center>
                            <label for="" class="text-muted text-left">NAME TABLE</label>
                            <input class="form-control mb-2" type="text"  value="<?php echo $row['roomName'] ?>" readonly="">
                            <label for="" class="text-muted text-left">PRICE</label>
                            <input class="form-control mb-2" type="text"  value="<?php echo $row['price'] ?>. bath"  readonly="">
                            <label for="" class="text-muted text-left">Number of people</label>
                            <input class="form-control mb-2" type="number" name="txtCount" id="txtCount" placeholder="Number of people staying" required="">
                            <label for="" class="text-muted text-left">Checkin Date (Open everyday)</label>
                            <input class="form-control mb-2" type="date" name="txtCheckinDate" id="txtCheckinDate"  required="" value="">
                            <label for="" class="text-muted text-left">Checkin Time (Open 17PM.)</label>
                            <input class="form-control mb-2" type="time" name="txtCheckinTime" id="txtCheckinTime"  required="" value="">
                            <label for="" class="text-muted text-left">Special request ♥</label>
                            <textarea class="form-control mb-2 w-100" type="text" name="txtSpe" id="txtSpe" placeholder="*can do not need to fill*"></textarea>
							<button type="submit" class="btn btn-info w-100 mt-3">SUBMIT</button>
							<div class="card-footer text-muted text-center mt-3"><h6>PLEASE DO PAYMENT <br>AFTER YOUR BOOKING DONE IN 2 HOURS</h6></div>
						</div>
					</div>
				</div>
                <?php 
            } 
            ?>
		</div>
        </header>
            <?php include('footer.php') ?>
    </body>
</form>
</html>