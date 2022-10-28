<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLoginA();
#echo $_POST["del_id"];
if(isset($_POST["event"])&&($_POST["event"]=="delete")){
    $FIN = "SELECT rooms.idRoom FROM bookings,rooms WHERE bookings.idRoom=rooms.idRoom AND bookings.idBook =".$_POST["del_id"];
    $FIX = doSelect($FIN);
    $FIND = mysqli_fetch_assoc($FIX);
    $UTA = 'UPDATE rooms SET quantity = quantity + 1 WHERE idRoom ='.$FIND["idRoom"];
    mysqli_query($conn,$UTA);

	$SQL = "DELETE FROM bookings WHERE idBook=".$_POST["del_id"];
    #echo $FIX;
    #echo $FIND["idRoom"];
	doSQL($SQL,"ลบข้อมูลการจองแล้ว","ไม่สามารถลบข้อมูลการจองได้","bookingUser.php");
}
#echo $FIX;
$SQL = "SELECT bookings.idBook,users.idUser,users.fName,users.lName,types.typeName,rooms.roomName,bookings.peopleCount,bookings.BookingDate,bookings.checkinDate,bookings.status,admins.fName,admins.lName,bookings.slipPath,admins.idAdmin 
FROM bookings,admins,rooms,users,types 
WHERE bookings.idAdmin=admins.idAdmin AND bookings.idRoom=rooms.idRoom 
AND bookings.idUser=users.idUser AND bookings.idAdmin=admins.idAdmin AND types.IdType =rooms.IdType 
ORDER BY bookings.idBook ASC";
$rsbook = doSelect($SQL);
#echo $SQL;
?>
<!DOCTYPE html>
<html lang="en">
<form method="POST">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Bookings Management</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
        <style>
 
        /* Set display to none for image*/
        #image {
            display: none;
        }
    </style>
    </head>
    <body id="page-top">
    <?php include('navAdmin1.php') ?>
        <header class="masthead  text-white text-center">
        <div class="container">
				
					<div class="row">
						<table class="table">
                            <thead class="thead-dark">
                            <tr class="table-borderless">
                                <td collspan="4"></td>
                                <td></td>
                            </tr>
                                <tr>
                                    <th>NO.</th>
                                    <th>ID BOOKING</th>
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>TYPE</th>
                                    <th>ROOM NAME</th>
                                    <th>NOP.</th>
                                    <th>BOOKING DATE</th>
                                    <th>CHECKIN DATE</th>
                                    <th>STATUS</th>
                                    <th>ID ADMIN</th>
                                    <th>MENU</th>
                                    <th><a href="insertbooking.php" class="btn btn-success text-white">INSERT BOOKING</a></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            while($row = mysqli_fetch_assoc($rsbook)){
                                $i++
                            
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row["idBook"] ?></td>
                                    <td><?php echo $row["fName"] ?></td>
                                    <td><?php echo $row["lName"] ?></td>
                                    <td><?php echo $row["typeName"] ?></td>
                                    <td><?php echo $row["roomName"] ?></td>
                                    <td><?php echo $row["peopleCount"] ?> Seat</td>
                                    <td><?php echo $row["BookingDate"] ?></td>
                                    <td><?php echo $row["checkinDate"] ?></td>
                                    <td>
                                    <?php if($row["status"]=="Y"){
									echo "<b class=\"text-success\">Confirm</b>";
								}elseif(($row["status"]=="C")){
									echo "<b class=\"text-danger\">Cancle by Admin</b>";
								}elseif(($row["status"]=="N")&&(!empty($row["slipPath"]))){
									echo "<b class=\"text-warning\">Waiting for Admin</b>";
                                    echo '<button class="btn btn-light" type="button" onclick="show()" id="btnID"><i class="fa fa-eye" aria-hidden="true"></i></button>';
                                    echo '<img class="" style="width: 200px; height: 230px;" id="image" src="'.$row["slipPath"].'" alt="GFG image" />';
                                    
								}elseif(($row["status"]=="O")){
									echo "<b class=\"text-secondary\">Stay</b>";
								}else{
									echo "<b class=\"text-info\">Waiting for Payment</b>";
								} ?></td>
                                    <td><?php echo $row["idAdmin"]?></td>
                                    
                                    <td><a href="editBooking.php?booking=<?=$row["idBook"]?>" class="btn btn-warning text-white">EDIT</a></td>
                                    <td><a class="btn btn-danger text-white" href="#" Onclick="del(<?php echo $row["idBook"];?>)">CANCLE</a></td>
                                </tr>
                                <?php 
                            }
                             ?>   
                            </tbody>
                        </table>
					</div>
                    
				
		</div>
        </header>
    <input type="hidden" name="del_id" id="del_id">
	<input type="hidden" name="event" id="event">
	<script type="text/javascript">
		function del(idBook) {
		if(confirm("ต้องการลบข้อมูล?")){
		document.forms[0]["del_id"].value=idBook;
		document.forms[0]["event"].value="delete";
		document.forms[0].action="";
		document.forms[0].submit();
		}
		}
        function show() {
            document.getElementById('image')
                    .style.display = "block";
            document.getElementById('btnID')
                    .style.display = "none";
        }
    </script>
    <?php include('footer.php') ?>
    </body>
</form>
</html>