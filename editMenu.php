<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLoginA();
$food = $_GET['food'];
$getfood = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * FROM menu WHERE idfood="'.$food.'"'));
if(isset($_POST["save"])){
    if((is_uploaded_file($_FILES['tpic1']['tmp_name']))&&(is_uploaded_file($_FILES['tpic2']['tmp_name']))&&(is_uploaded_file($_FILES['tpic3']['tmp_name']))){ // 1*2*3
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/menu'.$_FILES['tpic1']['name']);
        $pic1 = 'assets/menu'.$_FILES['tpic1']['name'];
        move_uploaded_file($_FILES['tpic2']['tmp_name'],'assets/menu'.$_FILES['tpic2']['name']);
        $pic2 = 'assets/menu'.$_FILES['tpic2']['name'];
        move_uploaded_file($_FILES['tpic3']['tmp_name'],'assets/menu'.$_FILES['tpic3']['name']);
        $pic3 = 'assets/menu'.$_FILES['tpic3']['name'];
        $SQL = 'UPDATE menu SET namefood="'.$_POST['foodname'].'",price="'.$_POST['price'].'",quantity="'.$_POST['quan'].'",pic1="'.$pic1.'",pic2="'.$pic2.'",pic3="'.$pic3.'" WHERE idfood='.$_GET['food'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','menuAdmin.php');

    }elseif((is_uploaded_file($_FILES['tpic1']['tmp_name']))&&(is_uploaded_file($_FILES['tpic2']['tmp_name']))){// 1*2
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/menu'.$_FILES['tpic1']['name']);
        $pic1 = 'assets/menu'.$_FILES['pic1']['name'];
        move_uploaded_file($_FILES['tpic2']['tmp_name'],'assets/menu'.$_FILES['tpic2']['name']);
        $pic2 = 'assets/menu'.$_FILES['tpic2']['name'];
        $SQL = 'UPDATE menu SET namefood="'.$_POST['foodname'].'",price="'.$_POST['price'].'",quantity="'.$_POST['quan'].'",pic1="'.$pic1.'",pic2="'.$pic2.'" WHERE idfood='.$_GET['food'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','menuAdmin.php');

    }elseif((is_uploaded_file($_FILES['tpic1']['tmp_name']))&&(is_uploaded_file($_FILES['tpic3']['tmp_name']))){ //1*3
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/menu'.$_FILES['tpic1']['name']);
        $pic1 = 'assets/menu'.$_FILES['tpic1']['name'];
        move_uploaded_file($_FILES['tpic3']['tmp_name'],'assets/menu'.$_FILES['tpic3']['name']);
        $pic3 = 'assets/menu'.$_FILES['tpic3']['name'];
        $SQL = 'UPDATE menu SET namefood="'.$_POST['foodname'].'",price="'.$_POST['price'].'",quantity="'.$_POST['quan'].'",pic1="'.$pic1.'",pic3="'.$pic3.'" WHERE idfood='.$_GET['food'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','menuAdmin.php');

    }elseif((is_uploaded_file($_FILES['tpic2']['tmp_name']))&&(is_uploaded_file($_FILES['tpic3']['tmp_name']))){ // 2*3
        move_uploaded_file($_FILES['tpic2']['tmp_name'],'assets/menu'.$_FILES['tpic2']['name']);
        $pic2 = 'assets/menu'.$_FILES['tpic2']['name'];
        move_uploaded_file($_FILES['tpic3']['tmp_name'],'assets/menu'.$_FILES['tpic3']['name']);
        $pic3 = 'assets/menu'.$_FILES['tpic3']['name'];
        $SQL = 'UPDATE menu SET namefood="'.$_POST['foodname'].'",price="'.$_POST['price'].'",quantity="'.$_POST['quan'].'",pic2="'.$pic2.'",pic3="'.$pic3.'" WHERE idfood='.$_GET['food'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','menuAdmin.php');

    }elseif((is_uploaded_file($_FILES['tpic1']['tmp_name']))){ // 1
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/menu'.$_FILES['tpic1']['name']);
        $pic1 = 'assets/menu'.$_FILES['tpic1']['name'];
        $SQL = 'UPDATE menu SET namefood="'.$_POST['foodname'].'",price="'.$_POST['price'].'",quantity="'.$_POST['quan'].'",pic1="'.$pic1.'" WHERE idfood='.$_GET['food'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','menuAdmin.php');

    }elseif((is_uploaded_file($_FILES['tpic2']['tmp_name']))){ // 2
        move_uploaded_file($_FILES['tpic2']['tmp_name'],'assets/menu'.$_FILES['tpic2']['name']);
        $pic2 = 'assets/menu'.$_FILES['tpic2']['name'];
        $SQL = 'UPDATE menu SET namefood="'.$_POST['foodname'].'",price="'.$_POST['price'].'",quantity="'.$_POST['quan'].'",pic2="'.$pic2.'" WHERE idfood='.$_GET['food'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','menuAdmin.php');

    }elseif((is_uploaded_file($_FILES['tpic3']['tmp_name']))){ // 3
        move_uploaded_file($_FILES['tpic3']['tmp_name'],'assets/menu'.$_FILES['tpic3']['name']);
        $pic3 = 'assets/menu'.$_FILES['tpic3']['name'];
        $SQL = 'UPDATE menu SET namefood="'.$_POST['foodname'].'",price="'.$_POST['price'].'",quantity="'.$_POST['quan'].'",pic3="'.$pic3.'" WHERE idfood='.$_GET['food'];
        echo $SQL;
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','menuAdmin.php');

    }else{
        $SQL1 = 'UPDATE menu SET namefood="'.$_POST['foodname'].'",price="'.$_POST['price'].'",quantity="'.$_POST['quan'].'" WHERE idfood='.$_GET['food'];
        $ade = doSQL($SQL1,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','menuAdmin.php');

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
        <title>EditMenu Management</title>
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
                            <input class="form-control mb-2" type="text" name="foodname" id="foodname" placeholder="ROOM NAME" required="" value="<?=$getfood['namefood']?>">
                            <input class="form-control mb-2" type="number" name="price" id="price" placeholder="PRICE" required="" value="<?=$getfood['price']?>">
                            <input id="txtdetail" class="form-control mb-2" name="txtdetail" placeholder="DETAIL" value="<?=$getfood['details']?>"></input>
                            <input class="form-control mb-2" type="NUMBER" name="quan" id="quan" placeholder="QUANTITY" required="" value="<?=$getfood['quantity']?>">
                            <label class="text-dark mr-auto">UPLOAD PICTURE ♥</label>
                            <img src="<?php echo $getfood['pic1']; ?>" class="img-fluid w-100 mb-2" style="">
                            <input type="file" name="tpic1" id="tpic1" class="form-control mb-2">
                            <img src="<?php echo $getfood['pic2']; ?>" class="img-fluid w-100 mb-2" style="">
                            <input type="file" name="tpic2" id="tpic2" class="form-control mb-2">
                            <img src="<?php echo $getfood['pic3']; ?>" class="img-fluid w-100 mb-2" style="">
                            <input type="file" name="tpic3" id="tpic3" class="form-control mb-2">
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