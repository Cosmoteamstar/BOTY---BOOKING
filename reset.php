<?php
include('connector.php');
checkLogin();
$SQL = "SELECT * FROM users WHERE idUser=".$_SESSION["userID"];
$rsUser = doSelect($SQL);
$user = mysqli_fetch_assoc($rsUser);

if((isset($_POST["txtpaw"]))&&(!empty($_POST["txtpaw"]))){
$SQL = "SELECT * FROM users WHERE idUser=".$_SESSION["userID"]." AND password=".$_POST["txtpw"];
$rsw = doSelect($SQL);
$reset = mysqli_fetch_assoc($rsw);
if($reset){
    if(isset($_POST["txtpaw"])){
    $SQL = "UPDATE users SET password=\"".$_POST["txtpaw"]."\"
    WHERE idUser=\"".$_SESSION["userID"]."\" ";
        doSQL($SQL,"อัพเดทข้อมูลสำเร็จ","กรุณากรอกรหัสผ่านเก่าให้ถูกต้อง","index.php");
    }else{
        echo "<script>alert(\"เกิดข้อผิดพลาด ไม่สามารถอัพเดทข้อมูลได้\")</script>";
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
        <title>RESET PASSWORD</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
        <?php include('nav.php') ?>
        <header class="masthead  text-white text-center">
        <div class="container">

				<div class="col-md-10">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="card-text card w-50 p-3">
                            <label for="" class="text-muted text-left">EMAIL</label>
                            <input class="form-control mb-2" type="email" name="txtUName" id="txtUName" value="<?php echo $user["eMail"] ?>" readonly>
                            <label for="" class="text-muted text-left">PASSWORD</label>
                            <input class="form-control mb-2" type="password" name="txtpw" id="txtpw" placeholder="OLD PASSWORD" require="">
                            <input class="form-control mb-2" type="password" name="txtpaw" id="txtpaw" placeholder="NEW PASSWORD" require="">
							<button type="submit" class="btn btn-info w-100 mt-3">UPDATE</button>
							<div class="card-footer text-muted text-center mt-3"><h6>CAN'T REMEMBER PASSWORD?<br><a href="mailto:Cosmoteamstar@hotmail.com">PLS CONTACT US AT EMAIL!</a></h6></div>
						</div>
					</div>
				</div>
		</div>
        </header>
        <?php include('footer.php') ?>
    </body>
</form>
</html>