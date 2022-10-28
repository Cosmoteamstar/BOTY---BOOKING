<?php
include('connector.php');
checkLoginA();
if(!empty($_POST)){
    if(is_uploaded_file($_FILES['tpic1']['tmp_name'])){
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/slip'.$_FILES['tpic1']['name']);
        $pic = 'assets/slip'.$_FILES['tpic1']['name'];
        $SQL = 'INSERT INTO types (typeName,detail,tpic1) VALUE ("'.$_POST['typeName'].'","'.$_POST['detail'].'","'.$pic.'")';
        #echo $SQL;
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','type.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<form method="POST" enctype="multipart/form-data">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>INSERT TYPE</title>
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
                            <label class="text-dark mr-auto">TYPE NAME</label>
                            <input class="form-control mb-2" type="text" name="typeName" id="typeName" placeholder="TYPE NAME" required="">
                            <label class="text-dark mr-auto">DETAIL</label>
                            <input class="form-control mb-2" type="textarea" name="detail" id="detail" placeholder="Detail" required="">
                            <label class="text-dark mr-auto">UPLOAD PICTURE ♥</label>
                            <input type="file" name="tpic1" id="tpic1" class="form-control mb-2">
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