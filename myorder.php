<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLogin();
if(isset($_POST["Del"])){
	$SQL = "DELETE FROM orderfood WHERE idorder=".$_POST["Del"];
	doSQL($SQL,"ยกเลิกการสั่งอาหารแล้ว","ไม่สามารถลบข้อมูลได้","myorder.php");
}
$SQL = 'SELECT menu.pic1,orderfood.idorder,menu.namefood,orderfood.amount,orderfood.sumprice,orderfood.status FROM menu,orderfood WHERE orderfood.idUser="'.$_SESSION['userID'].'" AND orderfood.idfood=menu.idfood ORDER BY orderfood.status ASC';
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
        <title>BOTY.MY ORDER</title>
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
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4"></div>
						<table class="table">
                        
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Food</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>MENU</th>
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
                                    <td><?php echo $row["namefood"] ?></td>
                                    <td><?php echo $row["amount"] ?> pieces</td>
                                    <td><?php echo $row["sumprice"] ?> Baht</td>
                                    <td>
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
                                
                                    <td><?php if($row['status']=="N"){ ?><!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelIdDel<?=$row['idorder']?>">
                              Cancle
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modelIdDel<?=$row['idorder']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Would you like to cancle this order?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                        <div class="modal-body text-dark">
                                            <div class="container-fluid">
                                            <?php echo $row['namefood'] ?><br>
                                            Amount : <?php echo $row['amount'] ?><br>
                                            Price : <?php echo $row['sumprice'] ?>
                                            <img src="<?php echo $row['pic1']; ?>" class="img-fluid w-100 mb-2" style="">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger w-100" name="Del" value="<?=$row['idorder']?>" >Save</button>
                                            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div><?php } ?></td>
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