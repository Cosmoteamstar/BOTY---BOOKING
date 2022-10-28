<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLoginA();
#echo $_POST["del_id"];
if(isset($_POST["event"])&&($_POST["event"]=="delete")){
	$SQL = "DELETE FROM orderfood WHERE idorder=".$_POST["del_id"];
	doSQL($SQL,"ลบข้อมูลออเดอร์แล้ว","ไม่สามารถลบข้อมูลได้","orderuser.php");
}
#echo $FIX;
$SQL = "SELECT orderfood.idorder,orderfood.amount,orderfood.request,orderfood.status,menu.namefood,menu.price,users.fName,users.lName,users.phoneNumber,users.eMail FROM orderfood,menu,users WHERE users.idUser=orderfood.idUser AND menu.idfood=orderfood.idfood ORDER BY orderfood.idorder DESC";
$rsbook = doSelect($SQL);
if(isset($_POST['Deli'])){
    $deli = 'UPDATE orderfood SET status="D" WHERE idorder="'.$_POST['Deli'].'"';
    if(mysqli_query($conn,$deli)==TRUE){
        echo '<script>alert("กำลังจัดส่งอาหาร")</script>';
        echo '<script>location.replace("orderuser.php")</script>';
    }else{
        echo '<script>alert("เกิดข้อผิดพลาด ไม่สามารถทำรายการได้")</script>';
        echo '<script>location.replace("orderuser.php")</script>';
    }
}
if(isset($_POST['Con'])){
    $confirm = 'UPDATE orderfood SET status="Y" WHERE idorder="'.$_POST['Con'].'"';
    $seAmount = mysqli_fetch_assoc(mysqli_query($conn,'SELECT idfood FROM orderfood WHERE idorder="'.$_POST['Con'].'"'));
    $confirmAmount = 'UPDATE menu SET quantity=quantity-1 WHERE idfood="'.$seAmount['idfood'].'"';
    if((mysqli_query($conn,$confirm)==TRUE)&&(mysqli_query($conn,$confirmAmount)==TRUE)){
        echo '<script>alert("ยืนยันการสั่ง")</script>';
        echo '<script>location.replace("orderuser.php")</script>';
    }else{
        echo '<script>alert("เกิดข้อผิดพลาด ไม่สามารถทำรายการได้")</script>';
        echo '<script>location.replace("orderuser.php")</script>';
    }
}
if(isset($_POST['Cook'])){
    $deli = 'UPDATE orderfood SET status="O" WHERE idorder="'.$_POST['Cook'].'"';
    if(mysqli_query($conn,$deli)==TRUE){
        echo '<script>alert("กำลังทำอาหาร")</script>';
        echo '<script>location.replace("orderuser.php")</script>';
    }else{
        echo '<script>alert("เกิดข้อผิดพลาด ไม่สามารถทำรายการได้")</script>';
        echo '<script>location.replace("orderuser.php")</script>';
    }
}
if(isset($_POST['Suc'])){
    $deli = 'UPDATE orderfood SET status="S" WHERE idorder="'.$_POST['Suc'].'"';
    if(mysqli_query($conn,$deli)==TRUE){
        echo '<script>alert("ส่งอาหารเรียบร้อย")</script>';
        echo '<script>location.replace("orderuser.php")</script>';
    }else{
        echo '<script>alert("เกิดข้อผิดพลาด ไม่สามารถทำรายการได้")</script>';
        echo '<script>location.replace("orderuser.php")</script>';
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
        <title>Orders Management</title>
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
                                    <th>Menu</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th>Special Request</th>
                                    <th>Name</th>
                                    <th>user</th>
                                    <th>tel.</th>
                                    <th>Status</th>
                                    <th>#</th>
                                    <th><a href="insertorder.php" class="btn btn-success text-white">INSERT ORDER</a></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            #if(!isset($rsbook)){
                            while($row = mysqli_fetch_assoc($rsbook)){
                                $i++;
                                $sumprice = $row['amount']*$row['price'];
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row["namefood"] ?></td>
                                    <td><?php echo $row["amount"] ?></td>
                                    <td><?php echo $sumprice ?></td>
                                    <td><?php echo $row["request"] ?></td>
                                    <td><?php echo $row["fName"] ?></td>
                                    <td><?php echo $row["eMail"] ?></td>
                                    <td><?php echo $row["phoneNumber"] ?></td>
                                    <td>
                                    
                                    
                                    <script>
                                        $('#exampleModal').on('show.bs.modal', event => {
                                            var button = $(event.relatedTarget);
                                            var modal = $(this);
                                            // Use above variables to manipulate the DOM
                                            
                                        });
                                    </script>
                                    <?php if($row["status"]=="Y"){
									echo "<b class=\"text-success\">Confirm</b>";
								}elseif(($row["status"]=="C")){
									echo "<b class=\"text-danger\">Cancle by Admin</b>";
								}elseif(($row["status"]=="N")){
									echo "<b class=\"text-secondary\">Waiting</b>";
								}elseif(($row["status"]=="O")){
									echo "<b class=\"text-warning\">Cooking</b>";
								}elseif(($row["status"]=="D")){
									echo "<b class=\"text-info\">Delivered</b>";
								}elseif(($row["status"]=="S")){
									echo "<b class=\"text-muted\">Complete</b>";
								} ?></td>
                                    <?php if($row['status']=="N"){?>
                                        <!-- Button trigger modal -->
                                        <td>
                                        <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#modelIdCon<?=$row["idorder"]?>">
                                            Comfirm
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelIdCon<?=$row["idorder"]?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header bg-success text-white">
                                                                <h5 class="modal-title">Confirm Order!!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Menu : <?=$row["namefood"]?><br>
                                                            Amount : <?=$row["amount"]?><br>
                                                            User : <?=$row["fName"]."  ".$row["lName"]?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success w-100" name="Con" value="<?=$row["idorder"]?>">Save</button>
                                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                    <?php
                                    }elseif($row['status']=="Y"){ ?>
                                        <!-- Button trigger modal -->
                                        <td>
                                        <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#modelIdCook<?=$row["idorder"]?>">
                                            Cooking
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelIdCook<?=$row["idorder"]?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header bg-warning text-white">
                                                                <h5 class="modal-title">Cooking this menu!!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Menu : <?=$row["namefood"]?><br>
                                                            Amount : <?=$row["amount"]?><br>
                                                            User : <?=$row["fName"]."  ".$row["lName"]?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-warning w-100" name="Cook" value="<?=$row["idorder"]?>">Save</button>
                                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                    <?php }elseif($row['status']=="O"){ ?>
                                        <!-- Button trigger modal -->
                                        <td>
                                        <button type="button" class="btn btn-info text-white" data-toggle="modal" data-target="#modelIdDeli<?=$row["idorder"]?>">
                                            Delivered
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelIdDeli<?=$row["idorder"]?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header bg-info text-white">
                                                                <h5 class="modal-title">Want to deliver food?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Menu : <?=$row["namefood"]?><br>
                                                            User : <?=$row["fName"]."  ".$row["lName"]?><br>
                                                            Tel  : <?=$row["phoneNumber"]?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-info w-100" name="Deli" value="<?=$row["idorder"]?>">Save</button>
                                                        
                                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                    <?php }elseif($row['status']=="D"){
                                    ?>
                                    <!-- Button trigger modal -->
                                    <td>
                                        <button type="button" class="btn btn-secondary text-white" data-toggle="modal" data-target="#modelIdSuc<?=$row["idorder"]?>">
                                            Success
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelIdSuc<?=$row["idorder"]?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header bg-success text-white">
                                                                <h5 class="modal-title">This order is successful!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Menu : <?=$row["namefood"]?><br>
                                                            User : <?=$row["fName"]."  ".$row["lName"]?><br>
                                                            Tel  : <?=$row["phoneNumber"]?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success w-100" name="Suc" value="<?=$row["idorder"]?>">Save</button>
                                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                        <?php
                                    }else{
                                        ?>
                                        <td>----</td>
                                    <?php }if($row['status']!="C"){ ?>
                                    <td><a class="btn btn-danger text-white" href="#" Onclick="del(<?php echo $row["idorder"];?>)">CANCLE</a></td>
                                    <?php } ?>
                                </tr>
                                <?php 
                            }
                        #}
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