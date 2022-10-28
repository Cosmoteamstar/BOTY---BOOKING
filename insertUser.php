<?php
include('connector.php');
checkLoginA();
if(isset($_POST["txtmail"])){
$SQL = "SELECT COUNT(*) AS NUM FROM users WHERE eMail LIKE \"".$_POST["txtmail"]."\" ";
$chk = mysqli_fetch_assoc(doSelect($SQL));
 if($chk["NUM"]>0){
 	echo "<script>alert(\"อีเมล์นี้ถูกใช้แล้ว\")</script>";
 	header("refresh:0.1;url=register.php");
 	exit();
 }else{
    $SQL = "INSERT INTO users(fName,lName,phoneNumber,idcard,address,eMail,password)
    VALUES (\"".$_POST["txtfName"]."\",\"".$_POST["txtlName"]."\",\"".$_POST["txtphone"]."\",\"".$_POST["txtcard"]."\",\"".$_POST["txtaddr"]."\",\"".$_POST["txtmail"]."\",\"".$_POST["txtpw"]."\")";
//echo $SQL;
doSQL($SQL,"เพิ่มข้อมูลสำเร็จ","เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้","userDetail.php");
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
        <title>User Management</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
    <?php
        include('navAdmin1.php');
    ?>
        <header class="masthead  text-white text-center">
        <div class="container">
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="card-text card w-50 p-3">
                        <center><img src="assets/img/3.png" style="width:20%;"></center>
                            <input class="form-control mb-2" type="email" name="txtmail" id="txtmail" placeholder="EMAIL" required="">
                            
                            <input class="form-control mb-2" type="password" name="txtpw" id="txtpw" placeholder="PASSWORD" required="">
                           
                            <input class="form-control mb-2" type="text" name="txtfName" id="txtfName" placeholder="FISRT NAME" required="">
                            
                            <input class="form-control mb-2" type="text" name="txtlName" id="txtlName" placeholder="LAST NAME" required="">
                            
                            <input class="form-control mb-2" type="number" name="txtphone" id="txtphone" placeholder="PHONENUMBER" required="">
                            
                            <input class="form-control mb-2" type="text" name="txtaddr" id="txtaddr" placeholder="ADDRESS" required="">
                            
                            <input class="form-control mb-2" type="number" name="txtcard" id="txtcard" placeholder="ID CARD" required="">
                            
							<button type="submit" class="btn btn-info w-100 mt-3">SAVE</button>
						</div>
					</div>
				</div>
		</div>
        </header>
    <?php include('footer.php') ?>
    </body>
</form>
</html>