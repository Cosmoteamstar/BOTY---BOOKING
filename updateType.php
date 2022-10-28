<?php
#$conn = mysqli_connect('localhost','root','','dizdinner');
include('connector.php');
checkLoginA();
#echo $_FILES['tpic'];
    if(!empty($_FILES['tpic'])){
        if(is_uploaded_file($_FILES['tpic']['tmp_name'])){
            move_uploaded_file($_FILES['tpic']['tmp_name'],'assets/slip'.$_FILES['tpic']['name']);
            $pic = 'assets/slip'.$_FILES['tpic']['name'];
            $SQL = 'UPDATE types SET typeName="'.$_POST['typeName'].'",tpic1="'.$pic.'" WHERE idType='.$_GET['booking'];
            $ade = doSQL($SQL,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','type.php');
            #echo $SQL;
    }else{
        $SQL1 = 'UPDATE types SET typeName="'.$_POST['typeName'].'" WHERE idType='.$_GET['booking'];
        $ade = doSQL($SQL1,'บันทึกข้อมูลเรียบร้อย','เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมูลได้','type.php');
    }
}

$SQL = 'SELECT * FROM types WHERE idType='.$_GET['booking'];
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
        <title>UPDATE TYPE</title>
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
                            <input class="form-control mb-2" type="text" name="typeName" id="typeName" placeholder="TYPE NAME" required="" value="<?=$fet['typeName']?>">
                            <label class="text-dark mr-auto">PICTURE ♥</label>
                            <?php if($fet['tpic1']){?>
                            <img src="<?php echo $fet['tpic1']; ?>" class="img-fluid w-100 mb-2" style="">
                            <?php } ?>
                            <input type="file" name="tpic" id="tpic" class="form-control mb-2">
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