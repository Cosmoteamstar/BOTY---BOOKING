<?php
include('connector.php');
checkLoginA();
if(isset($_POST["txtUser"])){
$res = $_POST['txtCheckinDate'].' '.$_POST['txtCheckinTime'];
$SQL = 'INSERT INTO bookings(idUser,idAdmin,idRoom,peopleCount,status,BookingDate,checkinDate,special,slipPath)
VALUES ('.$_POST["txtUser"].','.$_SESSION["userIDA"].','.$_POST["txtTable"].','.$_POST['txtCount'].',"'.$_POST['txtStatus'].'","'.date('Y-m-d').'","'.$res.':00","'.$_POST["txtSpe"].'","")';
#echo $SQL;
doSQL($SQL,"เพิ่มข้อมูลการจองสำเร็จ","เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลการจองได้","bookingUser.php");
}
#$SIN = "SELECT admins.idAdmin,users.idUser,users.fName,users.lName,tables.idRoom,tables.roomName,types.idType,types.typeName FROM admins,tables,types,users";
$UIN = "SELECT users.idUser,users.fName,users.lName FROM users";
$AIN = "SELECT admins.idAdmin,admins.fName,admins.lName FROM admins";
$TIN = "SELECT idRoom,roomName FROM rooms";
$TYIN = "SELECT idType,typeName FROM types";
$SHW = doSelect($UIN);
$TIIN = doSelect($TIN);
$TYIIN = doSelect($TYIN);
?>
<!DOCTYPE html>
<html lang="en">
<form method=POST>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>INSERT BOOKING</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
    <?php include('navAdmin1.php') ?>
        <header class="masthead  text-white text-center">
        <div class="container">

				<div class="col-md-10">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="card-text card w-50 p-3">
                        <center><img src="assets/img/3.png" style="width:20%;"></center>
                            <div class="form-group">
                              <select class="form-control mb-2" name="txtUser" id="txtUser">
                            <?php while($row = mysqli_fetch_array($SHW)){
                             ?>
                                <option value="<?php echo $row["idUser"]?>"><?php echo $row["idUser"].': '.$row["fName"].' '.$row["fName"]?></option>
                            <?php } ?>
                              </select>
                              <select class="form-control mb-2" name="txtTable" id="txtTable">
                            <?php while($row = mysqli_fetch_array($TIIN)){
                             ?>
                                <option value="<?php echo $row["idRoom"]?>"><?php echo $row["idRoom"].': '.$row["roomName"]?></option>
                            <?php } ?>
                              </select>
                              <input class="form-control mb-2" type="number" name="txtCount" id="txtCount" placeholder="Number of people" required="">
                              <select class="form-control mb-2" name="txtStatus" id="txtStatus">
                                <option value="Y">Confirm</option>
                                <option value="C">Cancle by Admin</option>
                                <option value="N">Waiting</option>
                                <option value="O">Stay</option>
                              </select>
                            <input class="form-control mb-2" type="date" name="txtCheckinDate" id="txtCheckinDate"  required="" value="">
                            <input class="form-control mb-2" type="time" name="txtCheckinTime" id="txtCheckinTime"  required="" value="">
                            <textarea class="form-control mb-2 w-100" type="text" name="txtSpe" id="txtSpe" placeholder="*can do not need to fill*"></textarea>
                            </div>
							<button type="submit" class="btn btn-info w-100 mt-3">SAVE</button>
							<div class="card-footer text-muted text-center mt-3"><h6>ADMIN ID WILL AUTOMATICALLY ADD<br><a href="login.php"></a></h6></div>
						</div>
					</div>
				</div>
		</div>
        </header>
        <?php include('footer.php') ?>
    </body>
</form>
</html>