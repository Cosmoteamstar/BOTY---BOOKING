<?php
include('connector.php');
checkLoginA();
if(isset($_POST["roomName"])){
    #if(!empty($_FILES['tpic1'])){
        #echo 'ชัย';
    #}
    if((is_uploaded_file($_FILES['tpic1']['tmp_name']))&&(is_uploaded_file($_FILES['tpic2']['tmp_name']))&&(is_uploaded_file($_FILES['tpic3']['tmp_name']))){ // 1*2*3
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/slip'.$_FILES['tpic1']['name']);
        $pic1 = 'assets/slip'.$_FILES['tpic1']['name'];
        move_uploaded_file($_FILES['tpic2']['tmp_name'],'assets/slip'.$_FILES['tpic2']['name']);
        $pic2 = 'assets/slip'.$_FILES['tpic2']['name'];
        move_uploaded_file($_FILES['tpic3']['tmp_name'],'assets/slip'.$_FILES['tpic3']['name']);
        $pic3 = 'assets/slip'.$_FILES['tpic3']['name'];
        $SQL = 'UPDATE rooms SET roomName="'.$_POST['roomName'].'",pic1="'.$pic1.'",pic2="'.$pic2.'",pic3="'.$pic3.'" WHERE idRoom='.$_GET['booking'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
        #echo '1';
        #echo $_POST['pic1'];

    }elseif((is_uploaded_file($_FILES['tpic1']['tmp_name']))&&(is_uploaded_file($_FILES['tpic2']['tmp_name']))){// 1*2
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/slip'.$_FILES['tpic1']['name']);
        $pic1 = 'assets/slip'.$_FILES['pic1']['name'];
        move_uploaded_file($_FILES['tpic2']['tmp_name'],'assets/slip'.$_FILES['tpic2']['name']);
        $pic2 = 'assets/slip'.$_FILES['tpic2']['name'];
        $SQL = 'UPDATE rooms SET roomName="'.$_POST['roomName'].'",pic1="'.$pic1.'",pic2="'.$pic2.'" WHERE idRoom='.$_GET['booking'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
            #echo '2';
    }elseif((is_uploaded_file($_FILES['tpic1']['tmp_name']))&&(is_uploaded_file($_FILES['tpic3']['tmp_name']))){ //1*3
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/slip'.$_FILES['tpic1']['name']);
        $pic1 = 'assets/slip'.$_FILES['tpic1']['name'];
        move_uploaded_file($_FILES['tpic3']['tmp_name'],'assets/slip'.$_FILES['tpic3']['name']);
        $pic3 = 'assets/slip'.$_FILES['tpic3']['name'];
        $SQL = 'UPDATE rooms SET roomName="'.$_POST['roomName'].'",pic1="'.$pic1.'",pic3="'.$pic3.'" WHERE idRoom='.$_GET['booking'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
            #echo '3';
    }elseif((is_uploaded_file($_FILES['tpic2']['tmp_name']))&&(is_uploaded_file($_FILES['tpic3']['tmp_name']))){ // 2*3
        move_uploaded_file($_FILES['tpic2']['tmp_name'],'assets/slip'.$_FILES['tpic2']['name']);
        $pic2 = 'assets/slip'.$_FILES['tpic2']['name'];
        move_uploaded_file($_FILES['tpic3']['tmp_name'],'assets/slip'.$_FILES['tpic3']['name']);
        $pic3 = 'assets/slip'.$_FILES['tpic3']['name'];
        $SQL = 'UPDATE rooms SET roomName="'.$_POST['roomName'].'",pic2="'.$pic2.'",pic3="'.$pic3.'" WHERE idRoom='.$_GET['booking'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
            #echo '4';
    }elseif((is_uploaded_file($_FILES['tpic1']['tmp_name']))){ // 1
        move_uploaded_file($_FILES['tpic1']['tmp_name'],'assets/slip'.$_FILES['tpic1']['name']);
        $pic1 = 'assets/slip'.$_FILES['tpic1']['name'];
        $SQL = 'UPDATE rooms SET roomName="'.$_POST['roomName'].'",pic1="'.$pic1.'" WHERE idRoom='.$_GET['booking'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
            #echo '5';
    }elseif((is_uploaded_file($_FILES['tpic2']['tmp_name']))){ // 2
        move_uploaded_file($_FILES['tpic2']['tmp_name'],'assets/slip'.$_FILES['tpic2']['name']);
        $pic2 = 'assets/slip'.$_FILES['tpic2']['name'];
        $SQL = 'UPDATE rooms SET roomName="'.$_POST['roomName'].'",pic2="'.$pic2.'" WHERE idRoom='.$_GET['booking'];
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
            #echo '6';
    }elseif((is_uploaded_file($_FILES['tpic3']['tmp_name']))){ // 3
        move_uploaded_file($_FILES['tpic3']['tmp_name'],'assets/slip'.$_FILES['tpic3']['name']);
        $pic3 = 'assets/slip'.$_FILES['tpic3']['name'];
        $SQL = 'UPDATE rooms SET roomName="'.$_POST['roomName'].'",pic3="'.$pic3.'" WHERE idRoom='.$_GET['booking'];
        echo $SQL;
        $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
            #echo '7';
    }else{
        $SQL1 = 'UPDATE rooms SET roomName="'.$_POST['roomName'].'" WHERE idRoom='.$_GET['booking'];
        $ade = doSQL($SQL1,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','roomtable.php');
            #echo '8';
    }
}
$SQL = 'SELECT * FROM rooms WHERE idRoom='.$_GET['booking'];
$fet = mysqli_fetch_assoc(doSelect($SQL));
?>
<!DOCTYPE html>
<html lang="en">
<form method="POST" enctype="multipart/form-data">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>UPDATE ROOMS</title>
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
                            <label class="text-dark mr-auto">ROOM NAME</label>
                            <input class="form-control mb-2" type="text" name="roomName" id="roomName" placeholder="ROOMS NAME" required="" value="<?=$fet['roomName']?>">
                            <?php if($fet['pic1']){?>
                            <label class="text-dark mr-auto">PICTURE 1</label>
                            <img src="<?php echo $fet['pic1']; ?>" class="img-fluid w-100 mb-2" style="">
                            <?php } ?>
                            <input type="file" name="tpic1" id="tpic1" class="form-control mb-2">
                            <?php if($fet['pic2']){?>
                            <label class="text-dark mr-auto">PICTURE 2</label>
                            <img src="<?php echo $fet['pic2']; ?>" class="img-fluid w-100 mb-2" style="">
                            <?php } ?>
                            <input type="file" name="tpic2" id="tpic2" class="form-control mb-2">
                            <?php if($fet['pic3']){?>
                            <label class="text-dark mr-auto">PICTURE 3</label>
                            <img src="<?php echo $fet['pic3']; ?>" class="img-fluid w-100 mb-2" style="">
                            <?php } ?>
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