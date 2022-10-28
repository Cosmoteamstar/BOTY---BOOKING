<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLoginA();
if(isset($_POST["event"])&&($_POST["event"]=="delete")){
	$SQL = "DELETE FROM users WHERE idUser=".$_POST["del_id"];
	doSQL($SQL,"ลบข้อมูลการจองแล้ว","ไม่สามารถลบข้อมูลการจองได้","userDetail.php");
}
$SQL = "SELECT * FROM users ORDER BY idUser ASC";
$rsbook = doSelect($SQL);
?>
<!DOCTYPE html>
<html lang="en">
<form method="POST">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>USERS Management</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
    <?php include('navAdmin1.php') ?>
        <header class="masthead  text-white text-center">
        <div class="container">

					<div class="row">
						<table class="table">
                        
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>ID USER</th>
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>PHONENUMBER</th>
                                    <th>ADDRESS</th>
                                    <th>EMAIL</th>
                                    <th>MENU</th>
                                    <th><a href="insertUser.php" class="btn btn-success text-white">Insert+</a></th>
                                    <th><a href="Request.php" class="btn btn-success text-white">Request</a></th>
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
                                    <td><?php echo $row["idUser"] ?></td>
                                    <td><?php echo $row["fName"] ?></td>
                                    <td><?php echo $row["lName"] ?></td>
                                    <td><?php echo $row["phoneNumber"] ?></td>
                                    <td><?php echo $row["address"] ?></td>
                                    <td><?php echo $row["eMail"]?></td>
                                    <td>#</td>
                                    <td><a href="updateUser.php?uid=<?php echo $row["idUser"]?>" class="btn btn-warning text-white">EDIT</a></td>
                                    <td><a class="btn btn-danger text-white" href="#" Onclick="del(<?php echo $row["idUser"];?>)">Cancle</a></td>
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
	</script>
    <?php include('footer.php') ?>
    </body>
</form>
</html>