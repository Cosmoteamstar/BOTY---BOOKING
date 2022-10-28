<?php
include('connector.php');
checkLogin();
$SQL = "SELECT * FROM rooms WHERE rooms.idRoom=".$_GET['type']."";
$rsty = doSelect($SQL);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>BOTY.HOME</title>
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
        <?php
                    #echo $SQL;
		                while($row = mysqli_fetch_assoc($rsty)){
	                ?>
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <div class="text-center">            
                    <h2 class="page-section-heading text-secondary mb-0 d-inline-block mt-5">
                    <?php echo $row['roomName'];
                    ?></h2>
                </div>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-80" src="<?=$row['pic1']?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-80" src="<?=$row['pic2']?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-80" src="<?=$row['pic3']?>" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <br>
                    <div class="col-md-11 mt-3">
					<div class="row">
						<div class="card-text card w-100 p-3">
                        <h3>NAME : <?=$row['roomName']?></h3>
                        <h3>PRICE : <t class="text-danger"><?=$row['price']?></t> Bath</h3>
                        <h3>QUANTITY : <?=$row['quantity']?> ROOMS</h3></div>
                        <div class="card-text card w-100 p-3">
                        <div class="card-footer text-muted  mt-3">
                        <h3>DETAIL : <?=$row['details']?></h3></div>
                        <?php if($row['quantity']!=0){

                         ?>
							<a href="book.php?book=<?=$row['idRoom']?>" class="btn btn-info text-white mt-5 w-100"><b>BOOK NOW!!</b></a>
                        <?php }else{
                            echo "<h3 class=\"text-center\">Sorry,The table is busy.</h3>";
                        } ?>
						</div>
					</div>
				</div>
                    <div class="col-md-6 col-lg-4 mb-5">                           
                        </div>
                    <?php 
                        } 
                    ?>
                </div>
            </div>
        </section>
        
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="mb-4">LOCATION</h4>
                        <p class="pre-wrap lead mb-0">156 Loei,Markon
JaluernRat, 420000</p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="mb-4">AROUND THE WEB</h4><a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/Cosmoteamstar"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/menxfire/"><i class="fab fa-fw fa-instagram"></i></a>

                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="mb-4">ABOUT</h4>
                        <p class="pre-wrap lead mb-0">GOOD VIBE,THAILAND CO</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <section class="copyright py-4 text-center text-white">
            <div class="container"><small class="pre-wrap">LOEI TECHNICAL COLLEGE</small></div>
        </section>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed"><a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>