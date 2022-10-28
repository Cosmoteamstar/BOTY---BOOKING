<?php
include('connector.php');
checkLoginA();
$SIN = 'SELECT bookings.slipPath,bookings.idUser,bookings.idBook,users.fName,users.lName,rooms.roomName,bookings.peopleCount,bookings.status,bookings.checkinDate,bookings.special FROM bookings,users,rooms WHERE bookings.idBook="'.$_GET['booking'].'" AND bookings.idUser=users.idUser AND rooms.idRoom=bookings.idRoom';
$UIN = "SELECT users.idUser,users.fName,users.lName FROM users";
$AIN = "SELECT admins.idAdmin,admins.fName,admins.lName FROM admins";
$TIN = "SELECT idRoom,roomName FROM rooms";
$TYIN = "SELECT idType,typeName FROM types";
$SHW = doSelect($UIN);
$TIIN = doSelect($TIN);
$TYIIN = doSelect($TYIN);
$AL = doSelect($SIN);
$ALL = mysqli_fetch_assoc($AL);
#echo $ALL['fName'];

if(isset($_POST["txtTable"])){
    $res = $_POST['txtCheckinDate'].' '.$_POST['txtCheckinTime'];
    if(isset($_POST["txtTable"])){
    $SQL = 'UPDATE bookings SET idUser='.$ALL['idUser'].',idAdmin='.$_SESSION["userIDA"].',idRoom='.$_POST["txtTable"].',peopleCount='.$_POST['txtCount'].',status="'.$_POST['txtStatus'].'",checkinDate="'.$res.':00",special="'.$_POST["txtSpe"].'" WHERE idBook='.$_GET['booking'];
    #echo $SQL;
    doSQL($SQL,"แก้ไขข้อมูลการจองสำเร็จ","เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลการจองได้","bookingUser.php");
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<form method=POST>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Booking Management</title>
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
                            <input class="form-control mb-2" type="text" name="txtUser" id="txtUser" value="<?=$ALL["fName"].' '.$ALL['lName']?>" readonly>
                              <select class="form-control mb-2" name="txtTable" id="txtTable">
                            <?php while($row = mysqli_fetch_array($TIIN)){
                             ?>
                                <option value="<?php echo $row["idRoom"]?>"><?php echo $row["idRoom"].': '.$row["roomName"]?></option>
                            <?php } ?>
                              </select>
                              <input class="form-control mb-2" type="number" name="txtCount" id="txtCount" placeholder="" value="<?=$ALL['peopleCount']?>" selected>
                              <select class="form-control mb-2" name="txtStatus" id="txtStatus">
                                <option value="Y">Confirm</option>
                                <option value="C">Cancle by Admin</option>
                                <option value="N">Waiting</option>
                                <option value="O">Stay</option>
                              </select>
                            <input class="form-control mb-2" type="text" name="datetimez" id="datetimez"  required="" value="<?=$ALL['checkinDate']?>" readonly>
                            <input class="form-control mb-2" type="date" name="txtCheckinDate" id="txtCheckinDate"  required="" value="">
                            <input class="form-control mb-2" type="time" name="txtCheckinTime" id="txtCheckinTime"  required="" value="">
                            <textarea class="form-control mb-2 w-100" type="text" name="txtSpe" id="txtSpe" placeholder="*can do not need to fill*"><?=$ALL['special']?></textarea>
                            <?php if($ALL['slipPath']){?>
                            <img src="<?php echo $ALL['slipPath']; ?>" class="img-fluid" style="width:300px; height:400px;">
                            <?php } ?>
                            </div>
                            <a class="btn btn-info" href="#" onclick="edit(<?=$ALL['idBook'];?>)">SAVE</a>
							<div class="card-footer text-muted text-center mt-3"><h6>ADMIN ID WILL AUTOMATICALLY ADD<br><a href="login.php"></a></h6></div>
						</div>
					</div>
				</div>
		</div>
        </header>
    <input type="hidden" name="del_id" id="del_id">
	<input type="hidden" name="event" id="event">
	<script type="text/javascript">
		 function edit(idBook) {
		 if(confirm("ต้องการอัพเดทข้อมูล?")){
		 document.forms[0]["del_id"].value=idBook;
		 document.forms[0]["event"].value="delete";
		 document.forms[0].action="";
		 document.forms[0].submit();
		 }
		 }
	</script>
     <?php include('footer.php') ?>
    </body>
</form>
</html>