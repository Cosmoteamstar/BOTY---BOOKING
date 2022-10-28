<?php
include('connector.php');
checkLoginA();
if(isset($_POST["txtUName"])){
$SQL = "UPDATE admins SET fName=\"".$_POST["txtfName"]."\",
lName=\"".$_POST["txtlName"]."\",
eMail=\"".$_POST["txtUName"]."\",
phoneNumber=\"".$_POST["txtPhone"]."\"
WHERE idAdmin=\"".$_SESSION["userIDA"]."\" ";
doSQL($SQL,"อัพเดทข้อมูลสำเร็จ","เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลได้","indexadmin.php");
}
$SQL = "SELECT * FROM admins WHERE idAdmin=".$_SESSION["userIDA"];
$rsUser = doSelect($SQL);
$user = mysqli_fetch_assoc($rsUser);
?>
<!DOCTYPE html>
<html lang="en">
<form method=POST>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>DIZ.Personal-Info</title>
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
                            <label for="" class="text-muted text-left">ID</label>
                            <input class="form-control mb-2" type="email" name="txtid" id="txtid" value="<?php echo $user["idAdmin"] ?>" readonly>
                            <label for="" class="text-muted text-left">EMAIL</label>
                            <input class="form-control mb-2" type="text" name="txtUName" id="txtUName" placeholder="EMAIL" value="<?php echo $user["eMail"] ?>"readonly>
                            <label for="" class="text-muted text-left">FISRT NAME</label>
                            <input class="form-control mb-2" type="text" name="txtfName" id="txtfName" placeholder="FISRT NAME" value="<?php echo $user["fName"] ?>">
                            <label for="" class="text-muted text-left">LAST NAME</label>
                            <input class="form-control mb-2" type="text" name="txtlName" id="txtlName" placeholder="LAST NAME" value="<?php echo $user["lName"] ?>">
                            <label for="" class="text-muted text-left">PHONENUMBER</label>
                            <input class="form-control mb-2" type="text" name="txtPhone" id="txtPhone" placeholder="LAST NAME" value="<?php echo $user["phoneNumber"] ?>">
                            <label for="" class="text-muted text-left">PERMISSION</label>
                            <input class="form-control mb-2" type="text" name="txtPer" id="txtPer" placeholder="PERMISSION" value="<?php echo $user["permission"] ?>"readonly>
							<button type="submit" class="btn btn-info w-100 mt-3">UPDATE</button>
							<div class="card-footer text-muted text-center mt-3"><h6>WOULD YOU WANT RESET PASSWORD?<br><a href="resetadmin.php">RESET PASSWORD HERE!</a></h6></div>
						</div>
					</div>
				</div>
		</div>
        </header>
        <?php include('footer.php') ?>
    </body>
</form>
</html>