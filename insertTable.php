<?php
include('connector.php');
checkLoginA();
if(!empty($_POST)){
    if(is_uploaded_file($_FILES['pic1']['tmp_name'])){
        move_uploaded_file($_FILES['pic1']['tmp_name'],'assets/slip'.$_FILES['pic1']['name']);
        $pic1 = 'assets/slip'.$_FILES['pic1']['name'];
        move_uploaded_file($_FILES['pic2']['tmp_name'],'assets/slip'.$_FILES['pic2']['name']);
        $pic2 = 'assets/slip'.$_FILES['pic2']['name'];
        move_uploaded_file($_FILES['pic3']['tmp_name'],'assets/slip'.$_FILES['pic3']['name']);
        $pic3 = 'assets/slip'.$_FILES['pic3']['name'];
        $SQL = 'INSERT INTO rooms (idType,roomName,price,details,quantity,pic1,pic2,pic3) VALUE ('.$_POST['typ'].',"'.$_POST['roomName'].'","'.$_POST['price'].'"
        ,"'.$_POST['txtdetail'].'","'.$_POST['quan'].'","'.$pic1.'","'.$pic2.'","'.$pic3.'")';
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
        #echo $SQL;
    }else{
        echo '<script>alert("ไม่สามารถทำรายการได้")</script>';
    }
}
$trys = doSelect('SELECT types.typeName,types.idType FROM types');
?>
<!DOCTYPE html>
<html lang="en">
<form method="POST" enctype="multipart/form-data">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ROOMS Management</title>
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
                            <input class="form-control mb-2" type="text" name="roomName" id="roomName" placeholder="ROOM NAME" required="">
                              <label for="" class="text-dark mr-auto">ROOM TYPE</label>
                              <select class="form-control mb-2" name="typ" id="typ">
                              <?php 
                               while($row = mysqli_fetch_assoc($trys)){
                              ?>
                                <option value="<?=$row['idType']?>"><?=$row['typeName']?></option>
                                <?php } ?>
                              </select>
                            <input class="form-control mb-2" type="number" name="price" id="price" placeholder="PRICE" required="">
                            <textarea id="txtdetail" class="form-control mb-2" name="txtdetail" placeholder="DETAIL"></textarea>
                            <input class="form-control mb-2" type="NUMBER" name="quan" id="quan" placeholder="QUANTITY" required="">
                            <label class="text-dark mr-auto">UPLOAD PICTURE ♥</label>
                            <input type="file" name="pic1" id="pic1" class="form-control mb-2" required="">
                            <input type="file" name="pic2" id="pic2" class="form-control mb-2" required="">
                            <input type="file" name="pic3" id="pic3" class="form-control mb-2" required="">
							<button type="submit" class="btn btn-info w-100 mt-3" name="save" id="save">SAVE</button>
						</div>
					</div>
				</div>
		</div>
        </header>
        <?php include('footer.php') ?>
    </body>
</form>
</html>