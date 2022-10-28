<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLoginA();
$user = mysqli_query($conn,'SELECT eMail FROM users');
$mew = mysqli_query($conn,'SELECT namefood FROM menu');
if(isset($_POST['Save'])){
$iduser = mysqli_fetch_assoc(mysqli_query($conn,'SELECT iduser FROM users WHERE eMail="'.$_POST['user'].'"'));
$idfood = mysqli_fetch_assoc(mysqli_query($conn,'SELECT idfood FROM menu WHERE namefood="'.$_POST['sta'].'"'));

$price = mysqli_fetch_assoc(mysqli_query($conn,'SELECT price FROM menu WHERE idfood="'.$idfood['idfood'].'"'));
$sumprice = (($price['price'])*($_POST['txtCount']));
$SQL = 'INSERT INTO orderfood(idfood,idUser,amount,sumprice,request,status)
VALUES ("'.$idfood['idfood'].'",'.$iduser['iduser'].',"'.$_POST['txtCount'].'","'.$sumprice.'","'.$_POST['Spe'].'","'.$_POST['stat'].'")';
if(mysqli_query($conn,$SQL)==TRUE){
    echo '<script>alert("เพิ่มรายการเรียบร้อย")</script>';
    echo '<script>location.replace("orderuser.php")</script>';
}else{
    echo '<script>alert("เกิดข้อผิดพลาดไม่สามารถทำรายการได้")</script>';
    echo '<script>location.replace("orderuser.php")</script>';
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
        <?php include('navAdmin1.php') ?>
        <header class="masthead  text-white text-center">
        <div class="container">
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="card-text card w-50 p-3">
                        <center><img src="assets/img/3.png" style="width:20%;"></center>
                            <div class="form-group text-left">
                            <label for="" class="text-muted text-left">MENU</label>
                              <select class="form-control" name="sta" id="sta">
                                <?php while($menu = mysqli_fetch_assoc($mew)){ ?>
                                <option value="<?=$menu['namefood']?>"><?=$menu['namefood']?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group text-left">
                            <label for="" class="text-muted text-left">USER</label>
                              <select class="form-control" name="user" id="user">
                                <?php while($userd = mysqli_fetch_assoc($user)){ ?>
                                    
                                <option value="<?=$userd['eMail']?>"><?=$userd['eMail']?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <label for="" class="text-muted text-left">Amount</label>
                            <input class="form-control mb-2" type="number" name="txtCount" id="txtCount" placeholder="Amount for menu" required=""> 
                            <label for="" class="text-muted text-left">Special request ♥</label>
                            <input class="form-control mb-2" type="text" name="spe" id="spe" placeholder="*Can do not fill*" required=""> 
							<!-- Button trigger modal -->
                            <div class="form-group text-left">
                            <label for="" class="text-muted text-left">STATUS♦</label>
                              <select class="form-control" name="stat" id="stat">
                                <option value="Y">Confirm</option>
                                <option value="C">Cancle by Admin</option>
                                <option value="N">Waiting</option>
                                <option value="O">Cooking</option>
                                <option value="D">Delivered</option>
                                <option value="S">Complete</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-success" name="Save" id="Save">
                              SAVE
                            </button>
                            <script>
							<div class="card-footer text-muted text-center mt-3"><h6>PLEASE DO PAYMENT <br>PAY ON DELIVERY</h6></div>
						</div>
					</div>
				</div>
		</div>
    </div>
        </header>
            <?php include('footer.php') ?>
    </body>
</form>
</html>