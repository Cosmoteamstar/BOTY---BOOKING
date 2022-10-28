<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLoginA();
if(isset($_POST["event"])&&($_POST["event"]=="delete")){
	$SQL = "DELETE FROM rooms WHERE idRoom=".$_POST["del_id"];
	doSQL($SQL,"ลบข้อมูลแล้ว","ไม่สามารถลบข้อมูลของได้","roomtable.php");
}
$SQL = "SELECT rooms.*,types.typeName FROM rooms,types WHERE rooms.idType=types.idType ORDER BY rooms.idRoom ASC";
$rstb = doSelect($SQL);
?>
<!DOCTYPE html>
<html lang="en">
<form method=POST>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ROOMS Management</title>
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
				<div class="col-xl-24">
					<div class="row">
						
						<table class="table">
                        
                            <thead class="thead-dark">
                            <tr class="table-borderless">
                               
                                <td collspan="4"></td>
                                <td></td>
                            </tr>
                                <tr>
                                    <th>NO.</th>
                                    <th>ID TABLE</th>
                                    <th>TABLE NAME</th>
                                    <th>PRICE</th>
                                    <th>DETAILS</th>
                                    <th>QUANTITY</th>
                                    <th>TYPENAME</th>
                                    <th>MENU</th>
                                    <th><a href="insertTable.php" class="btn btn-success text-white">INSERT TABLE</a></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            while($row = mysqli_fetch_assoc($rstb)){
                                $i++
                            
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row["idRoom"] ?></td>
                                    <td><?php echo $row["roomName"] ?></td>
                                    <td><?php echo $row["price"] ?></td>
                                    <td><?php echo $row["details"] ?></td>
                                    <td><?php echo $row["quantity"] ?></td>
                                    <td><?php echo $row["typeName"] ?></td>
                                    <td><a href="updateTables.php?booking=<?=$row["idRoom"]?>" class="btn btn-warning text-white">EDIT</a></td>
                                    <td><a class="btn btn-danger text-white" href="#" Onclick="del(<?php echo $row["idRoom"];?>)">Cancle</a></td>
                                </tr>
                                <?php 
                            }
                             ?>   
                            </tbody>
                        </table>
					</div>
				</div>
		</div>
        </header>
    <input type="hidden" name="del_id" id="del_id">
	<input type="hidden" name="event" id="event">
	<script type="text/javascript">
		 function del(idRoom) {
		 if(confirm("ต้องการลบข้อมูล?")){
		 document.forms[0]["del_id"].value=idRoom;
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