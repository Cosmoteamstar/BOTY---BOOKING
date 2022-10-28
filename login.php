<?php
include('connector.php');
if(isset($_POST["txtUName"])&&(!empty($_POST["txtUName"]))){
$SQL = "SELECT * FROM users WHERE eMail=\"".$_POST["txtUName"]."\" AND password=\"".$_POST["txtpw"]."\" ";
if($rsUser = doSelect($SQL)){
	$user = mysqli_fetch_assoc($rsUser);
	$_SESSION["userID"]=$user["idUser"];
	$_SESSION["userName"]=$user["fName"].'  '.$user["lName"];
	header("refresh:0.1;url=index.php");
}else if(isset($_POST["txtUName"])&&(!empty($_POST["txtUName"]))){
    $SQL = "SELECT * FROM admins WHERE eMail=\"".$_POST["txtUName"]."\" AND pw=\"".$_POST["txtpw"]."\" ";
if($rsUser = doSelect($SQL)){
	$user = mysqli_fetch_assoc($rsUser);
	$_SESSION["userIDA"]=$user["idAdmin"];
	$_SESSION["userNameA"]=$user["fName"].'  '.$user["lName"];
    $_SESSION["Admingroup"]=$user['permission'];
	header("refresh:0.1;url=indexadmin.php");
}else{
    echo "<script>alert(\"ไม่สามารถเข้าสู่ระบบได้กรุณาลองใหม่อีกครั้ง\")</script>";
}
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
        <title>BOTY.LOGIN</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
        <?php include('navguest.php') ?>
        <header class="masthead  text-white text-center">
        <div class="container">

				<div class="col-md-10">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="card-text card w-50 p-3">
                        <center><img src="assets/img/3.png" style="width:20%;"></center>
							<input class="form-control mt-2" type="email" name="txtUName" id="txtUName" placeholder="EMAIL" required="">
							<input class="form-control mt-2" type="password" name="txtpw" id="txtpw" placeholder="PASSWORD" required="">
							<button type="submit" class="btn btn-info w-100 mt-3">LOGIN</button>
							<div class="card-footer text-muted text-center mt-3"><h6>IF YOU DONT HAVE AN ACCOUT<br><a href="register.php">REGISTER HERE!</a></h6></div>
						</div>
					</div>
				</div>
		</div>
        </header>
        <?php include('footer.php') ?>
    </body>
</form>
</html>