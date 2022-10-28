<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLogin();
$SQL = "SELECT * FROM menu WHERE idfood=".$_GET['food']."";
$rsty = doSelect($SQL);

if(isset($_POST['save'])){
$qerty = mysqli_fetch_assoc($rsty);
$price = mysqli_fetch_assoc(mysqli_query($conn,'SELECT price FROM menu WHERE idfood="'.$_GET['food'].'"'));
$sumprice = (($price['price'])*($_POST['txtCount']));
$SQL = 'INSERT INTO orderfood(idfood,idUser,amount,sumprice,request,status)
VALUES ("'.$_GET['food'].'",'.$_SESSION['userID'].',"'.$_POST['txtCount'].'","'.$sumprice.'","'.$_POST['txtSpe'].'","N")';
if(mysqli_query($conn,$SQL)==TRUE){
    echo '<script>alert("สั่งอาหารเรียบร้อย!!! ราคารวม : '.$sumprice.' บาท")</script>';
    echo '<script>location.replace("food.php")</script>';
}else{
    echo '<script>alert("เกิดข้อผิดพลาดไม่สามารถทำรายการได้")</script>';
    echo '<script>location.replace("food.php")</script>';
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
        <title>Restaurant Order</title>
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
                            <label for="" class="text-muted text-left">NAME</label>
                            <input class="form-control mb-2" type="text"  value="<?php echo $row['namefood'] ?>" readonly="">
                            <label for="" class="text-muted text-left">PRICE</label>
                            <input class="form-control mb-2" type="text"  value="<?php echo $row['price'] ?>. bath"  readonly="">
                            <label for="" class="text-muted text-left">Amount</label>
                            <input class="form-control mb-2" type="number" name="txtCount" id="txtCount" placeholder="" required="">
                            <label for="" class="text-muted text-left">Special request ♥</label>
                            <textarea class="form-control mb-2 w-100" type="text" name="txtSpe" id="txtSpe" placeholder="*can do not need to fill*"></textarea>
                            <img src="<?php echo $row['pic1']; ?>" class="img-fluid w-100 mb-2" style="">
							<!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modelIdSave<?=$row['idfood']?>">
                              SUBMIT
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modelIdSave<?=$row['idfood']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                            <div class="modal-header bg-success text-white">
                                                    <h5 class="modal-title">Would you like to order food?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                        <div class="modal-body text-dark">
                                            <div class="container-fluid">
                                            <?php echo $row['namefood'] ?><br>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success w-100" name="save" value="<?=$row['idfood']?>" >Save</button>
                                            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                $('#exampleModal').on('show.bs.modal', event => {
                                    var button = $(event.relatedTarget);
                                    var modal = $(this);
                                    // Use above variables to manipulate the DOM
                                    
                                });
                            </script>
							<div class="card-footer text-muted text-center mt-3"><h6>PLEASE DO PAYMENT <br>PAY ON DELIVERY</h6></div>
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