<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLoginA();
$SQL = "SELECT * FROM register";
$rsbook = doSelect($SQL);
if(isset($_POST["event"])&&($_POST["event"]=="delete")){
	$SQL = "DELETE FROM users WHERE idUser=".$_POST["del_id"];
	doSQL($SQL,"ลบข้อมูลการจองแล้ว","ไม่สามารถลบข้อมูลการจองได้","userDetail.php");
}
if(isset($_POST['Con'])){
    $regis = mysqli_fetch_assoc($rsbook);
    $confir = "INSERT INTO users(fName,lName,phoneNumber,idcard,address,eMail,password)
    VALUES (\"".$regis["fname"]."\",\"".$regis["lname"]."\",\"".$regis["phonenumber"]."\",\"".$regis["idcard"]."\",\"".$regis["address"]."\",\"".$regis["username"]."\",\"".$regis["password"]."\")";
    $condel = 'DELETE FROM register WHERE idguest="'.$_POST['Con'].'"';
    if((mysqli_query($conn,$confir)==TRUE)&&(mysqli_query($conn,$condel)==TRUE)){
        echo '<script>alert("Success")</script>';
        echo '<script>location.replace("request.php")</script>';
    }else{
        //echo $confir;
        echo '<script>alert("เกิดข้อผิดพลาด ไม่สามารถทำรายการได้")</script>';
        echo '<script>location.replace("request.php")</script>';
    }
}
if(isset($_POST['Del'])){
    $regis = mysqli_fetch_assoc($rsbook);
    $condel = 'DELETE FROM register WHERE idguest="'.$_POST['Del'].'"';
    if(mysqli_query($conn,$condel)==TRUE){
        echo '<script>alert("ลบข้อมูลเรียบร้อยแล้ว")</script>';
        echo '<script>location.replace("request.php")</script>';
    }else{
        echo '<script>alert("เกิดข้อผิดพลาด ไม่สามารถทำรายการได้")</script>';
        echo '<script>location.replace("request.php")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<form method="POST">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Request Management</title>
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
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>PHONENUMBER</th>
                                    <th>ADDRESS</th>
                                    <th>EMAIL</th>
                                    <th>MENU</th>
                                    <th>#</th>
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
                                    <td><?php echo $row["fname"] ?></td>
                                    <td><?php echo $row["lname"] ?></td>
                                    <td><?php echo $row["phonenumber"] ?></td>
                                    <td><?php echo $row["address"] ?></td>
                                    <td><?php echo $row["username"]?></td>
                                    <td><button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#modelIdCon<?=$row["idguest"]?>">
                                            Comfirm
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelIdCon<?=$row["idguest"]?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header bg-success text-white">
                                                                <h5 class="modal-title">Confirm user</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Email : <?=$row["username"]?><br>
                                                            Name : <?=$row["fname"]."  ".$row["lname"]?><br>
                                                            Tel : <?=$row["phonenumber"]?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success w-100" name="Con" value="<?=$row["idguest"]?>">Save</button>
                                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></td>
                                    <td><button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#modelIdDel<?=$row["idguest"]?>">
                                            Cancle
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelIdDel<?=$row["idguest"]?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title">Cancle request</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Email : <?=$row["username"]?><br>
                                                            Name : <?=$row["fname"]."  ".$row["lname"]?><br>
                                                            Tel : <?=$row["phonenumber"]?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger w-100" name="Del" value="<?=$row["idguest"]?>">Save</button>
                                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></td>
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